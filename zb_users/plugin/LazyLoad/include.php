<?php
#注册插件
RegisterPlugin("LazyLoad","ActivePlugin_LazyLoad");

function ActivePlugin_LazyLoad() {
  Add_Filter_Plugin('Filter_Plugin_ViewPost_Template', 'LazyLoad_Main');
}

function LazyLoad_Main(&$template){
	global $zbp;
  $article = $template->GetTags('article');
  $placeIMG = $zbp->host . 'zb_users/plugin/LazyLoad/img/grey.gif';
  $article->Content = preg_replace("/(<img[^>]+src=)[\"']?([^\"']+\.(gif|jpg|jpeg|png|webp))/", "$1\"{$placeIMG}\" data-original=\"$2", $article->Content);
	$zbp->footer .= "<script type=\"text/javascript\" src=\"{$zbp->host}zb_users/plugin/LazyLoad/js/lazyload.min.js\"></script>\r\n";
	$zbp->footer .= "<script type=\"text/javascript\">
	$(function() {
    	$(\"{$zbp->Config('LazyLoad')->LazyLoadImg}\").lazyload({
			placeholder:\"{$zbp->host}zb_users/plugin/LazyLoad/img/grey.gif\",
            effect:\"fadeIn\",
			failurelimit : 30
          });
    	});
</script>\r\n";
}

function InstallPlugin_LazyLoad() {
	global $zbp;
	if(!$zbp->HasConfig('LazyLoad'))
	{
		$zbp->Config('LazyLoad')->LazyLoadImg = 'img';
		$zbp->SaveConfig('LazyLoad');
	}
}

function UninstallPlugin_LazyLoad() {
	global $zbp;
	//额，就不删了吧？？？删了您的配置咋办？
#	$zbp->DelConfig('LazyLoad');
}