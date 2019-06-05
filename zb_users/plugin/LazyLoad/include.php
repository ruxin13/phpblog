<?php
#注册插件
RegisterPlugin("LazyLoad", "ActivePlugin_LazyLoad");

function ActivePlugin_LazyLoad()
{
  Add_Filter_Plugin('Filter_Plugin_Zbp_MakeTemplatetags', 'LazyLoad_AddJS');
  Add_Filter_Plugin('Filter_Plugin_Zbp_BuildTemplate', 'LazyLoad_BuildTemplate');
  Add_Filter_Plugin('Filter_Plugin_ViewPost_Template', 'LazyLoad_Main');
}
function LazyLoad_AddJS()
{
  global $zbp;
  $zbp->footer .= "<script type=\"text/javascript\" src=\"{$zbp->host}zb_users/plugin/LazyLoad/js/lazyload.min.js\"></script>\n";
  $zbp->footer .= "<script type=\"text/javascript\">
	$(function() {
    	$(\"{$zbp->Config('LazyLoad')->LazyLoadImg}\").lazyload({
			// placeholder:\"{$zbp->host}zb_users/plugin/LazyLoad/img/grey.gif\",
            effect:\"fadeIn\",
			failurelimit : 30
          });
    	});
</script>\n";
}
function LazyLoad_BuildTemplate(&$template)
{
  global $zbp;
  $arrTpl = explode(',', $zbp->Config('LazyLoad')->templates);
  $arrTpl = array_unique($arrTpl);
  foreach ($arrTpl as $key => $value) {
    if (isset($template[$value])) {
      $template[$value] = LazyLod_replace($template[$value]);
    }
  }
}
function LazyLod_replace($content, $big = 0)
{
  global $zbp;
  $file = LazyLoad_Path("u-big");
  if ($big === 0 || !is_file($file))
    $placeIMG = LazyLoad_Path("u-img", "host");
  else
    $placeIMG = LazyLoad_Path("u-big", "host");
  $pattern = "/<img([^>]+)src=[\"']([^\"']+)[\"']([^>]+)>/";
  $content = preg_replace($pattern, "<img$1src=\"{$placeIMG}\" data-original=\"$2\"$3>", $content);
  return $content;
}

function LazyLoad_Main(&$template)
{
  global $zbp;
  $article = $template->GetTags('article');
  $article->Content = LazyLod_replace($article->Content, 1);
}

function LazyLoad_Path($file, $t = "path")
{
  global $zbp;
  $result = $zbp->$t . "zb_users/plugin/LazyLoad/";
  switch ($file) {
    case "u-img":
      return $result . "usr/loading.gif";
      break;
    case "u-big":
      return $result . "usr/loading-big.gif";
      break;
    case "v-img":
      return $result . "img/grey.gif";
      break;
    case "main":
      return $result . "main.php";
      break;
    default:
      return $result . $file;
  }
}

function InstallPlugin_LazyLoad()
{
  global $zbp;
  if (!$zbp->HasConfig('LazyLoad')) {
    $zbp->Config('LazyLoad')->LazyLoadImg = 'img[src$=\'loading.gif\']';
    $zbp->Config('LazyLoad')->templates = 'post-multi,post-istop';
    $zbp->SaveConfig('LazyLoad');
  }
  $filesList = array("img");
  foreach ($filesList as $key => $value) {
    $uFile = LazyLoad_Path("u-{$value}");
    $vFile = LazyLoad_Path("v-{$value}");
    if (!is_file($uFile)) {
      @mkdir(dirname($uFile));
      copy($vFile, $uFile);
    }
  }
}

function UninstallPlugin_LazyLoad()
{
  global $zbp;
#	$zbp->DelConfig('LazyLoad');
}
