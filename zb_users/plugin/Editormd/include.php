<?php
/**
 * Editor.md for Z-BlogPHP
 *
 * 插件嵌入页.
 *
 * @author 心扬 <chrishyze@163.com>
 */

// Composer Autoload
require_once __DIR__ . '/vendor/autoload.php';

use League\HTMLToMarkdown\HtmlConverter;

// 注册插件
RegisterPlugin('Editormd', 'ActivePlugin_Editormd');

/**
 *  挂载插件接口.
 */
function ActivePlugin_Editormd()
{
    global $zbp;

    /*
     * 检查编辑器冲突
     * 若冲突的插件已启用，则输出警告，并终止插件
     * 目前已知冲突的插件(ID)有：Neditor, UEditor，markdown，KindEditor，my_tinymce.
     */
    if ($zbp->CheckPlugin('Neditor') || $zbp->CheckPlugin('UEditor') || $zbp->CheckPlugin('markdown') || $zbp->CheckPlugin('KindEditor') || $zbp->CheckPlugin('my_tinymce')) {
        Add_Filter_Plugin('Filter_Plugin_Edit_Begin', 'EditorConflictWarning_Editormd');

        return;
    }

    //接口：文章编辑页加载前处理内容，输出位置在<head>尾部
    Add_Filter_Plugin('Filter_Plugin_Edit_Begin', 'EditHead_Editormd');

    //接口：文章编辑页加载前处理内容，输出位置在<body>尾部
    Add_Filter_Plugin('Filter_Plugin_Edit_End', 'EditBody_Editormd');

    //1号输出接口，在内容文本框下方，用于存放Editor.md 转换的 HTML 源码，以及加载提示
    Add_Filter_Plugin('Filter_Plugin_Edit_Response', 'Response1_Editormd');

    //处理文章页模板接口
    Add_Filter_Plugin('Filter_Plugin_ViewPost_Template', 'ExtraSupport_Editormd');

    //接口：提交文章数据接管
    Add_Filter_Plugin('Filter_Plugin_PostArticle_Core', 'PostData_Editormd');

    //接口：提交文章数据接管
    Add_Filter_Plugin('Filter_Plugin_PostPage_Core', 'PostData_Editormd');
}

/**
 * 编辑器冲突警告
 * 显示在后台页面最顶部.
 */
function EditorConflictWarning_Editormd()
{
    echo '<h2 style="text-align:center;color:red;">Editor.md提示您：编辑器发生冲突！请在插件中心关闭其他编辑器！</h2>';
}

/**
 * 文章编辑页面<head>尾部
 * 引入Editor.md文件.
 */
function EditHead_Editormd()
{
    global $zbp;
    echo '<link rel="stylesheet" type="text/css" href="' . $zbp->host . 'zb_users/plugin/Editormd/css/editormd.min.css">';
    echo '<script type="text/javascript" charset="utf-8" src="' . $zbp->host . 'zb_users/plugin/Editormd/editormd.min.js"></script>';
}

/**
 * 文章编辑页面<body>尾部
 * 配置和启动 Editor.md.
 */
function EditBody_Editormd()
{
    global $zbp;

    $plugin_url = $zbp->host . 'zb_users/plugin/Editormd';

    /**
     * 判断URL是否包含id，若包含则为重新编辑文章，否则为新建文章.
     */
    if (isset($_GET['id'])) {
        $act     = 1; //编辑文章标记，与前端交互
        $article = new Post;

        $article->LoadInfoByID((integer) $_GET['id']);
        //判断是否为Editormd创建的文章
        if (null === $article->Metas->md_content) {
            /**
             * 非Editormd创建的文章，需要先将HTML转为markdown
             * 使用 HTML To Markdown for PHP.
             */
            $converter = new HtmlConverter();
            //正文markdown
            try {
                $md_content = json_encode($converter->convert($article->Content));
            } catch (Exception $e) {
                $md_content = '';
            }
            //摘要markdown
            try {
                $md_intro = @json_encode($converter->convert($article->Intro));
            } catch (Exception $e) {
                $md_intro = '';
            }
        } else {
            //Editormd创建或编辑过的文章
            $md_content = json_encode($article->Metas->md_content);
            $md_intro   = json_encode($article->Metas->md_intro);
        }
    } else { //新建文章
        $act        = 0;
        $md_content = '';
        $md_intro   = '';
    }

    // 配置项
    $toolbartheme = $zbp->Config('Editormd')->toolbartheme;  // 工具栏主题设置
    $editortheme  = $zbp->Config('Editormd')->editortheme;   // 编辑区主题设置
    $previewtheme = $zbp->Config('Editormd')->previewtheme;  // 预览区主题设置
    $preview      = $zbp->Config('Editormd')->preview;       // 实时预览设置
    $dynamictheme = $zbp->Config('Editormd')->dynamictheme;  // 动态主题
    $autoheight   = $zbp->Config('Editormd')->autoheight;    // 编辑器自动长高
    $scrolling    = $zbp->Config('Editormd')->scrolling;     // 编辑器滚动
    $emoji        = $zbp->Config('Editormd')->emoji;         //  emoji

    if ('true' == $zbp->Config('Editormd')->htmldecode) {
        $htmlDecode = 'htmlDecode: true,';
    } elseif ('filter' == $zbp->Config('Editormd')->htmldecode) {
        $htmlDecode = 'htmlDecode: "' . $zbp->Config('Editormd')->htmlfilter . '",';
    } else {
        $htmlDecode = 'htmlDecode: false,';
    }
    if ('true' == $zbp->Config('Editormd')->extras) {
        $tocm      = $zbp->Config('Editormd')->tocm;       //  tocm列表设置
        $tasklist  = $zbp->Config('Editormd')->tasklist;   //  GFM 任务列表设置
        $flowchart = $zbp->Config('Editormd')->flowchart;  // 流程图设置
        $katex     = $zbp->Config('Editormd')->katex;      //  Tex 科学公式语言设置
        $sdiagram  = $zbp->Config('Editormd')->sdiagram;   // 时序图/序列图设置
    } else {
        $tocm      = 'false';
        $tasklist  = 'false';
        $flowchart = 'false';
        $katex     = 'false';
        $sdiagram  = 'false';
    }
    $texurl = $zbp->Config('Editormd')->texurl; // Tex路径
    if ('single' == $scrolling) {
        $scrolling = '"single"';
    }

    // 动态主题js函数
    if ('true' == $dynamictheme) {
        $dynamicfunction = '
function themeSelect(id, themes, lsKey, callback)
{
    var select = $("#" + id);

    for (var i = 0, len = themes.length; i < len; i ++) {
        var theme    = themes[i];
        var selected = (localStorage[lsKey] == theme) ? " selected=\"selected\"" : "";

        select.append("<option value=\"" + theme + "\"" + selected + ">" + theme + "</option>");
    }

    select.bind("change", function(){
         var theme = $(this).val();

        if (theme === ""){
            alert("theme == \"\"");
            return false;
        }

        localStorage[lsKey] = theme;
        callback(select, theme);
    });

    return select;
}
        ';
        $themeconfig = 'theme : (localStorage.theme) ? localStorage.theme : "' . $toolbartheme .
            '",previewTheme : (localStorage.previewTheme) ? localStorage.previewTheme : "' . $previewtheme .
            '",editorTheme : (localStorage.editorTheme) ? localStorage.editorTheme : "' . $editortheme . '"';
        $select      = '$("span#msg").html(\'<span id="theme-select">动态主题：<select id="editormd-theme-select"><option selected="selected" value="">选择工具栏主题</option></select>&emsp;<select id="editor-area-theme-select"><option selected="selected" value="">选择编辑器主题</option></select>&emsp;<select id="preview-area-theme-select"><option selected="selected" value="">选择实时预览主题</option></select></span><a href="' . $plugin_url . '/main.php#tabs=setting" style="border:solid 1px rgb(221,221,221);padding:4px 10px;margin-left:15px;">设 置</a>\');';
        $themeSelect = 'themeSelect("editormd-theme-select", editormd.themes, "theme", function($this, theme){
        ContentEditor.setTheme(theme);
        IntroEditor.setTheme(theme);
    });

    themeSelect("editor-area-theme-select", editormd.editorThemes, "editorTheme", function($this, theme) {
        ContentEditor.setCodeMirrorTheme(theme);
        IntroEditor.setCodeMirrorTheme(theme);
        // or ContentEditor.setEditorTheme(theme);
    });

    themeSelect("preview-area-theme-select", editormd.previewThemes, "previewTheme", function($this, theme) {
        ContentEditor.setPreviewTheme(theme);
        IntroEditor.setPreviewTheme(theme);
    });';
    } else {
        $dynamicfunction = '';
        $themeconfig     = 'theme : "' . $toolbartheme .
            '",previewTheme : "' . $previewtheme .
            '",editorTheme : "' . $editortheme . '"';
        $select      = '$("span#msg").html(\'<a href="' . $plugin_url . '/main.php#tabs=setting" style="border:solid 1px rgb(221,221,221);padding:4px 10px;position:relative;bottom:5px;float:right;">设 置</a>\');';
        $themeSelect = '';
    }

    /**
     * 预处理数据和界面，判断是否存在摘要
     * 定义并启动编辑器.
     */
    $script = <<<EOF
<script type="text/javascript" charset="utf-8">
var ContentEditor, IntroEditor;

//动态主题函数
$dynamicfunction

$(function() {
    var has_intro = false;

    if($act==1){ //编辑文章
        $("textarea#editor_content").val($md_content);
        $("textarea#editor_intro").val($md_intro);
        var md_intro = $("textarea#editor_intro").val();
        if(md_intro.length==0 || md_intro.indexOf("<!--autointro-->")>-1){//摘要为空或者自动生成的
            $("#insertintro").html('○ 正文中首条「横线」以上的内容将自动作为摘要。您也可以点击[<span id="autointro">手动编辑摘要</span>]');
        } else { //摘要不为空
            $("#insertintro").html('○ 下面是原文章中已经存在的摘要。您也可以[<span id="autointro">重新生成摘要</span>]');
            has_intro = true;
        } //不考虑全是空格的情况
    } else { //新建文章
        $("#insertintro").html('○ 正文中首条「横线」以上的内容将自动作为摘要。您也可以[<span id="autointro">手动编辑摘要</span>]');
    }

    localStorage["theme"]        = "$toolbartheme";
    localStorage["editorTheme"]  = "$editortheme";
    localStorage["previewTheme"] = "$previewtheme";

    //编辑器上方动态主题下拉选择框
    $select

    // 自定义 Emoji 的 url 路径
    editormd.emoji = {
        path : "$plugin_url/images/github-emojis/",
        ext  : ".png"
    };

    // 自定义 Katex 地址
    editormd.katexURL = {
        js  : "$texurl",
        css : "$texurl"
    };

    // 内容编辑器
    ContentEditor = editormd("carea", {
        width: "100%",
        height: 640,
        path : "$plugin_url/lib/",
        $themeconfig,
        codeFold : true,
        syncScrolling : $scrolling,
        saveHTMLToTextarea : true,    // 保存 HTML 到 Textarea
        searchReplace : true,
        autoHeight : $autoheight,
        watch : $preview,  // 实时预览
        $htmlDecode // HTML 标签解析
        emoji : $emoji,
        taskList : $tasklist,  // Github Flavored Markdown 任务列表
        toc : $tocm,
        tocm : $tocm,         // Using [TOCM]
        tex : $katex,                   // 科学公式TeX语言支持，默认关闭
        flowChart : $flowchart,             // 流程图支持，默认关闭
        sequenceDiagram : $sdiagram,       // 时序/序列图支持，默认关闭,
        imageUpload : true,
        imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
        imageUploadURL : "$plugin_url/php/upload.php",
        crossDomainUpload : false,
        autoFocus : false,
        onload : function() {
            $("#emloading").hide();
            content_editor_init(this);
            if (has_intro) {
                IntroEditor = editormd("tarea", {
                    width : "100%",
                    height : 300,
                    path : "$plugin_url/lib/",
                    saveHTMLToTextarea : true,
                    toolbarIcons : ["undo", "redo", "|", "bold", "del", "italic", "|", "h1", "h2", "h3", "h4", "h5", "h6", "|", "list-ul", "list-ol", "|","watch"],
                    autoFocus : false,
                    onload : function() {
                        intro_editor_init(this);
                    }
                });     
            }
        }
    });

    $themeSelect

    //重新生成摘要
    $("span#autointro").click(function(){
        if($("#divIntro").is(":hidden")) {
            $("#divIntro").show();
            $("html,body").animate({scrollTop:$("#divIntro").offset().top},"fast");
        }
        IntroEditor = editormd("tarea", {
            width: "100%",
            height: 300,
            path : "$plugin_url/lib/",
            saveHTMLToTextarea : true,
            toolbarIcons : ["undo", "redo", "|", "bold", "del", "italic", "|", "h1", "h2", "h3", "h4", "h5", "h6", "|", "list-ul", "list-ol", "|","watch"],
            onload : function() {
                intro_editor_init(this);
                var s=ContentEditor.getValue();
                var hr_index = s.indexOf("------------");
                if(hr_index==-1)//没有横线
                    hr_index = 256;//截取256个字符
                this.setValue(s.substr(0, hr_index));
            }
        });
    });

    $("#carea, #tarea").css("z-index", 100);

    //保存 HTML 源码
    $("form#edit").submit(function(e){
        $("textarea[name='carea-html-code']").val(ContentEditor.getHTML());
        if(IntroEditor!=undefined){
            $("textarea[name='tarea-html-code']").val(IntroEditor.getHTML());
        }
        //event.preventDefault();
    });

    // 内容编辑器初始化, 用于支持 editor_api
    content_editor_init = function(obj){
        editor_api.editor.content.obj=obj;//内容编辑器对象
        //内容编辑器api方法
        editor_api.editor.content.get=function(){return this.obj.getValue()};//获取编辑器所有内容
        editor_api.editor.content.put=function(str){return this.obj.setValue(str)};//设置编辑器的内容
        editor_api.editor.content.focus=function(){return this.obj.focus()};//让编辑器获得尾部焦点
        sContent=obj.getValue();
    }

    // 摘要编辑器初始化, 用于支持 editor_api
    intro_editor_init = function(obj){
        editor_api.editor.intro.obj=obj;//摘要编辑器对象
        //摘要编辑器api方法
        editor_api.editor.intro.get=function(){return this.obj.getValue()};
        editor_api.editor.intro.put=function(str){return this.obj.setValue(str)};
        editor_api.editor.intro.focus=function(){return this.obj.focus()};
        sIntro=obj.getValue();
    }
});
//重定义原有函数
function editor_init(){}
</script>
<script type="text/javascript" charset="utf-8" src="$plugin_url/plugins/paste-upload.js"></script>
<style type="text/css">
#divMain a, #divMain2 a {
    color: #666;
}
#divMain a:hover, #divMain2 a:hover {
    color: #666;
}
.editormd-html-textarea {
    display: none;
}
span#theme-select select {
    height: 29px;
}
span#autointro:hover {
    cursor: pointer;
    text-decoration: underline;
}
</style>
EOF;

    echo $script;
}

/**
 * 在内容文本框下方插入，
 * 用于存放Editor.md 转换的 HTML 源码
 * 以及加载提示，每次加载成功后会将此内容隐藏.
 */
function Response1_Editormd()
{
    global $zbp;
    echo '
    <textarea class="editormd-html-textarea" name="carea-html-code"></textarea>
    <textarea class="editormd-html-textarea" name="tarea-html-code"></textarea>
    <div id="emloading">
        <div style="font-size: 20px">Editormd 编辑器启动中……</div>
        <div style="color: #646464">如果这条消息一直显示，说明启动失败，请<a href="' . $zbp->host . 'zb_users/plugin/Editormd/main.php#tabs=help" target="_blank" style="text-decoration:underline">点击此处查看解决方案</a></div>
    </div>';
}

/**
 * 前台扩展语言支持.
 */
function ExtraSupport_Editormd(&$template)
{
    global $zbp,
        $action,
        $mip_start;

    //搜索页直接返回
    if ('search' == $action) {
        return;
    }

    $article = $template->GetTags('article');

    $doc = new DOMDocument('1.0', 'UTF-8');
    libxml_use_internal_errors(true);
    $doc->loadHTML($article->Content); //加载文章正文内容
    $xpath = new DOMXPath($doc);

    //兼容MIP，检测当前主题是否启用了官方MIP插件依赖
    if ($mip_start || 'true' == $zbp->Config('Editormd')->mipsupport) {
        if (false !== strpos($article, '[TOC]') || false !== strpos($article, '[TOCM]')) {
            $titles_html = '<div class="emd-toc"><div class="emd-toc-title">内容导航</div>';
            $headings    = $xpath->query('//h1 | //h2 | //h3 | //h4 | //h5 | //h6');
            foreach ($headings as $head) {
                $titles_html .= '<div class="emd-toc-item emd-toc-h' . substr($head->tagName, 1) . '"><a href="#' . trim($head->textContent) . '">' . $head->textContent . '</a></div>';
            }
            $titles_html .= '</div>';
            $zbp->header .= '<link rel="stylesheet" type="text/css" href="' . str_replace('mip/', '', substr($zbp->host, 5)) . 'zb_users/plugin/Editormd/css/mipsupport.css">'; //添加样式
            $article->Content = str_replace('[TOCM]', '', str_replace('[TOC]', '', $article->Content));
            $article->Content = $titles_html . $article->Content;
        }

        return;
    }
    //配置项
    $emoji     = $zbp->Config('Editormd')->emoji;      //  emoji
    $tocm      = $zbp->Config('Editormd')->tocm;       //  tocm列表设置
    $tasklist  = $zbp->Config('Editormd')->tasklist;   //  GFM 任务列表设置
    $flowchart = $zbp->Config('Editormd')->flowchart;  // 流程图设置
    $katex     = $zbp->Config('Editormd')->katex;      //  Tex 科学公式语言设置
    $texurl    = $zbp->Config('Editormd')->texurl;     // Tex路径
    $sdiagram  = $zbp->Config('Editormd')->sdiagram;   // 时序图/序列图设置

    if ('true' == $zbp->Config('Editormd')->htmldecode) {
        $htmlDecode = 'htmlDecode: true';
    } elseif ('filter' == $zbp->Config('Editormd')->htmldecode) {
        $htmlDecode = 'htmlDecode: "' . $zbp->Config('Editormd')->htmlfilter . '"';
    } else {
        $htmlDecode = 'htmlDecode: false';
    }

    //代码高亮，要确保存在markdown源码
    if ('true' == $zbp->Config('Editormd')->extras && null !== $article->Metas->md_content) {
        //使用Editormd的动态生成HTML代码高亮
        $zbp->header .= '<link rel="stylesheet" href="' . $zbp->host . 'zb_users/plugin/Editormd/css/editormd.preview.min.css">
        <style type="text/css">
            .editormd-html-preview {
                width: 100%;
                margin: 0;
                padding: 0;
            }
        </style>';
        $article->Content = str_replace('[TOC]', '', $article->Content);
        $article->Content = str_replace('[TOCM]', '', $article->Content);
        $article->Content = '<div id="html_content">' . $article->Content . '</div><div id="md_content"><textarea id="md_textarea" style="display:none;">' . $article->Metas->md_content . '</textarea></div>';

        $zbp->footer .= '<script src="' . $zbp->host . 'zb_users/plugin/Editormd/editormd.min.js"></script>
        <script src="' . $zbp->host . 'zb_users/plugin/Editormd/lib/marked.min.js"></script>
        <script src="' . $zbp->host . 'zb_users/plugin/Editormd/lib/prettify.min.js"></script>
        <script src="' . $zbp->host . 'zb_users/plugin/Editormd/lib/raphael.min.js"></script>';

        if ('true' == $sdiagram) {
            $zbp->footer .= '<script src="' . $zbp->host . 'zb_users/plugin/Editormd/lib/underscore.min.js"></script>
            <script src="' . $zbp->host . 'zb_users/plugin/Editormd/lib/sequence-diagram.min.js"></script>';
        }

        if ('true' == $flowchart) {
            $zbp->footer .= '<script src="' . $zbp->host . 'zb_users/plugin/Editormd/lib/flowchart.min.js"></script>
            <script src="' . $zbp->host . 'zb_users/plugin/Editormd/lib/jquery.flowchart.min.js"></script>';
        }

        $zbp->footer .= '<script type="text/javascript">
        editormd.emoji = {path : "' . $zbp->host . 'zb_users/plugin/Editormd/images/github-emojis/",ext  : ".png"};';
        if ('true' == $katex) {
            $zbp->footer .= 'editormd.katexURL = {js  : "' . $texurl . '",css : "' . $texurl . '"};';
        }
        $zbp->footer .= '$(function(){
            $("#html_content").hide();
            var EditormdView;
            EditormdView = editormd.markdownToHTML("md_content", {
                emoji           : ' . $emoji . ',
                toc             : ' . $tocm . ',
                tocm            : ' . $tocm . ',
                taskList        : ' . $tasklist . ',
                tex             : ' . $katex . ',
                flowChart       : ' . $flowchart . ',
                sequenceDiagram : ' . $sdiagram . ',
                ' . $htmlDecode . '
            });
        });</script>';
    } elseif (
        $zbp->option['ZC_SYNTAXHIGHLIGHTER_ENABLE'] &&
        $xpath->query('//pre')->length > 0
    ) {
        //使用静态代码高亮
        switch ($zbp->Config('Editormd')->codetheme) {
            case 'light_0':
                $codetheme = 'prettifylight';
                $linenums  = 'ol.linenums,ol.linenums li{list-style:none !important;margin-left:0 !important;}';
                break;
            case 'light_1':
                $codetheme = 'prettifylight';
                $linenums  = '';
                break;
            case 'dark_0':
                $codetheme = 'prettifymonokai';
                $linenums  = 'pre code{background-color: none !important;}ol.linenums,ol.linenums li{list-style:none !important;margin-left:0 !important;}';
                break;
            case 'dark_1':
                $codetheme = 'prettifymonokai';
                $linenums  = '';
                break;
            default:
                $codetheme = 'prettifylight';
                $linenums  = '';
                break;
        }
        $zbp->header .= '<link rel=\'stylesheet\' href=\'' . $zbp->host . 'zb_users/plugin/Editormd/css/' . $codetheme . '.css\'><script src=\'' . $zbp->host . 'zb_users/plugin/Editormd/lib/prettify.min.js\'></script><style>' . $linenums . '</style>';
        $zbp->footer .= '<script type="text/javascript">$(function(){ $("pre").addClass("prettyprint linenums"); prettyPrint(); });</script>';
    }
}

/**
 * 文章内容提交处理.
 */
function PostData_Editormd(&$article)
{
    global $zbp;
    // 保存原始markdown数据至扩展元数据
    $article->Metas->md_content = $article->Content;
    $article->Metas->md_intro   = $article->Intro;

    //获取正文的HTML源码
    $html             = $_POST['carea-html-code'];
    $article->Content = $html;
    //获取摘要的HTML源码
    if (empty($_POST['tarea-html-code'])) {
        $Parsedown      = new Parsedown();
        $article->Intro = $Parsedown->text($article->Intro);
        // 将<!--autointro-->放到最后
        $article->Intro = str_replace('<!--autointro-->', '', $article->Intro);
        $article->Intro = $article->Intro . '<!--autointro-->';
    } else {
        $article->Intro = $_POST['tarea-html-code'];
    }
    $article->Save();

    return $article;
}

/**
 * 插件安装激活时执行函数.
 */
function InstallPlugin_Editormd()
{
    global $zbp;

    // 初始化配置
    if (!$zbp->HasConfig('Editormd')) {
        $zbp->Config('Editormd')->toolbartheme = 'default';  // 工具栏主题设置
        $zbp->Config('Editormd')->editortheme  = 'default';  // 编辑区主题设置
        $zbp->Config('Editormd')->previewtheme = 'default';  // 预览区主题设置
        $zbp->Config('Editormd')->preview      = 'true';     // 实时预览
        $zbp->Config('Editormd')->autoheight   = 'false';    // 编辑器自动长高
        $zbp->Config('Editormd')->scrolling    = 'true';     // 编辑器滚动
        $zbp->Config('Editormd')->dynamictheme = 'true';     // 动态主题
        $zbp->Config('Editormd')->codetheme    = 'light_0';  // 前台代码主题
        $zbp->Config('Editormd')->emoji        = 'false';    // emoji 配置
        $zbp->Config('Editormd')->extras       = 'false';    // 扩展支持
        $zbp->Config('Editormd')->htmldecode   = 'false';    // HTML 解析
        $zbp->Config('Editormd')->tocm         = 'false';    // TOCM 列表
        $zbp->Config('Editormd')->tasklist     = 'false';    // GFM 任务列表
        $zbp->Config('Editormd')->flowchart    = 'false';    // 流程图
        $zbp->Config('Editormd')->katex        = 'false';    // Tex 科学公式语言
        $zbp->Config('Editormd')->sdiagram     = 'false';    // 时序图/序列图
        $zbp->Config('Editormd')->mipsupport   = 'false';    // 兼容第三方 MIP 主题
        // HTML 解析过滤标签
        $zbp->Config('Editormd')->htmlfilter   = 'style,script,iframe|on*';
        // Katex路径
        $zbp->Config('Editormd')->texurl       = $zbp->host . 'zb_users/plugin/Editormd/lib/katex/katex.min';
    }

    if (!file_exists(__DIR__ . '/images/github-emojis') || !file_exists(__DIR__ . '/lib/katex')) {
        $zbp->Config('Editormd')->getpack = 'true';
    } else {
        $zbp->Config('Editormd')->getpack = 'false';
    }
    //$zbp->Config('Editormd')->keepmeta = 1; // 默认保存扩展元数据

    $zbp->SaveConfig('Editormd');
}

/**
 * 插件卸载时执行函数
 */
function UninstallPlugin_Editormd()
{
    global $zbp;
    // 删除配置
    $zbp->DelConfig('Editormd');
}
