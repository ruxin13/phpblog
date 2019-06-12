<?php
/**
 * Editor.md for Z-BlogPHP
 *
 * AJAX配置处理.
 *
 * @author 心扬 <chrishyze@163.com>
 */

//系统初始化
require_once __DIR__ . '/../../../zb_system/function/c_system_base.php';
//后台初始化
require_once __DIR__ . '/../../../zb_system/function/c_system_admin.php';
//加载系统
$zbp->Load();
//声明HTTP资源类型为JSON
if (!headers_sent()) {
    header('Content-Type: application/json; charset=utf-8');
}
//检查权限
if (!$zbp->CheckRights('root')) {
    echo jsonResponse(array(false, '没有访问权限!'));
    die();
}
//检查主题/插件启用状态
if (!$zbp->CheckPlugin('Editormd')) {
    echo jsonResponse(array(false, '插件未启用!'));
    die();
}

//判断请求类型
if ('POST' == strtoupper($_SERVER['REQUEST_METHOD']) && GetVars('type', 'POST')) {
    if ('theme' == GetVars('type', 'POST')) { //主题设置
        if (GetVars('toolbartheme', 'POST')) {
            $zbp->Config('Editormd')->toolbartheme = GetVars('toolbartheme', 'POST');
        }

        if (GetVars('previewtheme', 'POST')) {
            $zbp->Config('Editormd')->previewtheme = GetVars('previewtheme', 'POST');
        }

        if (GetVars('editortheme', 'POST')) {
            $zbp->Config('Editormd')->editortheme = GetVars('editortheme', 'POST');
        }

        $zbp->SaveConfig('Editormd');
        echo jsonResponse(array(true, '主题保存成功!'));
    } elseif ('setting' == GetVars('type', 'POST')) { //主设置
        if (GetVars('dynamictheme', 'POST')) {
            $zbp->Config('Editormd')->dynamictheme = GetVars('dynamictheme', 'POST');
        }

        if (GetVars('preview', 'POST')) {
            $zbp->Config('Editormd')->preview = GetVars('preview', 'POST');
        }

        if (GetVars('codetheme', 'POST')) {
            $zbp->Config('Editormd')->codetheme = GetVars('codetheme', 'POST');
        }

        if (GetVars('autoheight', 'POST')) {
            $zbp->Config('Editormd')->autoheight = GetVars('autoheight', 'POST');
        }

        if (GetVars('scrolling', 'POST')) {
            $zbp->Config('Editormd')->scrolling = GetVars('scrolling', 'POST');
        }

        if (GetVars('emoji', 'POST')) {
            $zbp->Config('Editormd')->emoji = GetVars('emoji', 'POST');
        }

        if (GetVars('htmldecode', 'POST')) {
            $zbp->Config('Editormd')->htmldecode = GetVars('htmldecode', 'POST');
        }

        if (GetVars('htmlfilter', 'POST')) {
            $zbp->Config('Editormd')->htmlfilter = GetVars('htmlfilter', 'POST');
        }

        if (GetVars('extras', 'POST')) {
            $zbp->Config('Editormd')->extras = GetVars('extras', 'POST');
        }

        if (GetVars('tocm', 'POST')) {
            $zbp->Config('Editormd')->tocm = GetVars('tocm', 'POST');
        }

        if (GetVars('tasklist', 'POST')) {
            $zbp->Config('Editormd')->tasklist = GetVars('tasklist', 'POST');
        }

        if (GetVars('flowchart', 'POST')) {
            $zbp->Config('Editormd')->flowchart = GetVars('flowchart', 'POST');
        }

        if (GetVars('katex', 'POST')) {
            $zbp->Config('Editormd')->katex = GetVars('katex', 'POST');
        }

        if (GetVars('sdiagram', 'POST')) {
            $zbp->Config('Editormd')->sdiagram = GetVars('sdiagram', 'POST');
        }

        if (GetVars('mipsupport', 'POST')) {
            $zbp->Config('Editormd')->mipsupport = GetVars('mipsupport', 'POST');
        }

        $zbp->SaveConfig('Editormd');
        echo jsonResponse(array(true, '配置保存成功!'));
    }
} elseif ('GET' == strtoupper($_SERVER['REQUEST_METHOD'])) {
    if (GetVars('action', 'GET')) {
        if ('delay' == GetVars('action', 'GET')) { //暂停获取扩展包
            $zbp->Config('Editormd')->getpack = 'delay';
            $zbp->SaveConfig('Editormd');
        } elseif ('getpack' == GetVars('action', 'GET')) { //重新获取扩展包
            $zbp->Config('Editormd')->getpack = 'true';
            $zbp->SaveConfig('Editormd');
        } elseif ('pack' == GetVars('action', 'GET')) { //打包
            include_once __DIR__ . '/lib/EmdPack.class.php';
            $emdpack = new EmdPack;
            if (!$emdpack->Pack('images/github-emojis/') || !$emdpack->Pack('lib/katex/')) {
                echo jsonResponse(array(false, '打包失败！'));
            } else {
                echo jsonResponse(array(true, '打包成功！'));
            }
        }
    } else {
        $result = GetPack();
        if ($result[0]) {
            $zbp->Config('Editormd')->getpack = 'false';
            $zbp->SaveConfig('Editormd');
            echo jsonResponse(array(true, $result[1]));
        } else {
            $zbp->Config('Editormd')->getpack = 'true';
            $zbp->SaveConfig('Editormd');
            echo jsonResponse(array(false, $result[1]));
        }
    }
} else {
    echo jsonResponse(array(false, '非法请求!'));
    die();
}

/**
 * 获取远程包并解压.
 *
 * @return array
 */
function GetPack()
{
    include_once __DIR__ . '/lib/EmdPack.class.php';

    $emdpack = new EmdPack;
    $urls    = array();

    //检查是否支持解压
    if (function_exists('gzinflate')) {
        $urls[] = 'http://oss.nebstec.com/editormd-ext-packs/github-emojis.gpak';
        $urls[] = 'http://oss.nebstec.com/editormd-ext-packs/katex.gpak';
    } else {
        $urls[] = 'http://oss.nebstec.com/editormd-ext-packs/github-emojis.pak';
        $urls[] = 'http://oss.nebstec.com/editormd-ext-packs/katex.pak';
    }

    $pack_sha1 = array(
        'github-emojis.gpak' => '9c5619eb75bf68c3f8fc02509858ebe630c6ca43',
        'github-emojis.pak'  => 'b6bed789dd47fc85db5d79759e853e9888c41e88',
        'katex.gpak'         => 'c2925cfea996244897157acd3f7ae5e2c7659d16',
        'katex.pak'          => '4603ee64623ac1dc9a3e22bb436cfa11b494bdd3',
    );
    $pack_md5 = array(
        'github-emojis.gpak' => '7beec1139c0d5b6db7b7c4e115f612a5',
        'github-emojis.pak'  => 'ce9e574c652391bb412cb4af1401cff2',
        'katex.gpak'         => '6f88cc607890b1197230a91a685f9d35',
        'katex.pak'          => '2d9d5801613e1b74513d22f690437739',
    );

    if (!file_exists(__DIR__ . '/lib/packs')) {
        if (!@mkdir(__DIR__ . '/lib/packs', 0755, true)) {
            return array(false, '创建文件夹出错！请检查服务器的文件读写权限！');
        }
    }

    $packs = array();
    foreach ($urls as $url) {
        $filename = basename($url);
        if (!file_exists(__DIR__ . '/lib/packs/' . $filename)) {
            $pack = $emdpack->GetRemotePack($url); //下载包
            if (empty($pack)) {
                return array(false, '下载扩展包出错！请检查服务器的网络状态！');
            }

            //写入文件
            if (!@file_put_contents(__DIR__ . '/lib/packs/' . $filename, $pack)) {
                return array(false, '保存扩展包出错！请检查服务器的文件读写权限！');
            }
        } else {
            $pack = @file_get_contents(__DIR__ . '/lib/packs/' . $filename);
        }
        //进行文件校验
        $checksum = true;
        if (function_exists('sha1')) {
            if (sha1($pack) !== $pack_sha1[$filename]) {
                $checksum = false;
            }
        } elseif (function_exists('md5')) {
            if (md5($pack) !== $pack_md5[$filename]) {
                $checksum = false;
            }
        } else {
            $checksum = false;
        }
        if (!$checksum) {
            return array(false, '文件校验出错！文件可能被篡改，请停止获取扩展包并及时联系开发者！');
        }

        $packs[] = $filename;
    }

    //解包
    foreach ($packs as $p) {
        if (!$emdpack->UnPack(__DIR__ . '/lib/packs/' . $p)) {
            return array(false, '解开扩展包出错！请检查服务器的文件读写权限！');
        }
    }

    if (file_exists(__DIR__ . '/images/github-emojis') && file_exists(__DIR__ . '/lib/katex')) {
        return array(true, '成功获取扩展包！');
    } else {
        return array(false, '获取扩展包失败！');
    }
}

/**
 * JSON消息响应
 * 转义输出，避免中文转码 Unicode
 * 兼容 PHP5.3～PHP7.
 *
 * @param array $arr 消息数组，仅支持一维数组
 *
 * @return string
 */
function jsonResponse($arr)
{
    foreach ($arr as &$value) {
        $value = htmlspecialchars($value);
    }

    if (version_compare(PHP_VERSION, '5.4.0', '<')) {
        $str = json_encode($arr);

        return preg_replace_callback(
            '#\\\u([0-9a-f]{4})#i',
            function ($matchs) {
                return iconv('UCS-2BE', 'UTF-8', pack('H4', $matchs[1]));
            },
            $str
        );
    } else {
        return json_encode(
            $arr,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
    }
}

