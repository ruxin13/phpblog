<?php
require dirname(__FILE__) . DIRECTORY_SEPARATOR . '/modular.php';
RegisterPlugin("um_blog","ActivePlugin_um_blog");


function ActivePlugin_um_blog(){
Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu','um_blog_AddMenu');
Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','um_blog_tags_set');
Add_Filter_Plugin('Filter_Plugin_Zbp_Load','um_blog_rebuild_Main');
global $zbp;
$zbp->LoadLanguage('theme', 'um_blog');
}


function um_blog_AddMenu(&$m){
global $zbp;
	array_unshift($m, MakeTopMenu("root",'主题配置',$zbp->host . "zb_users/theme/um_blog/main.php","","topmenu_um_blog"));
}
function um_blog_tags_set(&$template){
	global $zbp;
    $template->SetTags('um_blog_ms',$zbp->Config('um_blog')->ms);
    $template->SetTags('um_blog_gjc',$zbp->Config('um_blog')->gjc);
	$template->SetTags('um_blog_zs',$zbp->Config('um_blog')->zs);
	$template->SetTags('um_blog_fs',$zbp->Config('um_blog')->fs);
}
function InstallPlugin_um_blog(){
	global $zbp;
	if(!$zbp->Config('um_blog')->HasKey('Version')){
		$zbp->Config('um_blog')->Version = '1.2';
		$zbp->Config('um_blog')->bn = 'false';
		$zbp->Config('um_blog')->ms = '网站描述';
		$zbp->Config('um_blog')->gjc = '网站关键词';
		$zbp->Config('um_blog')->zs = '6699cc';
		$zbp->Config('um_blog')->fs = '6eabe8';
		$zbp->SaveConfig('um_blog');
	}
}

//卸载主题
function UninstallPlugin_um_blog(){
	global $zbp;
}
?>