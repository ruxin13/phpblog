<?php
#注册插件
RegisterPlugin("Uplist","ActivePlugin_Uplist");
function ActivePlugin_Uplist() {
	Add_Filter_Plugin('Filter_Plugin_Admin_Header','Uplist_Plus');
}
function Uplist_Plus() {
	global $zbp;
	echo '<link href="'. $zbp->host .'zb_users/plugin/Uplist/style.css?v=1.1" rel="stylesheet">' . "\r\n";
	echo '<script src="'. $zbp->host .'zb_users/plugin/Uplist/main.js?v=1.1"></script>' . "\r\n";
}