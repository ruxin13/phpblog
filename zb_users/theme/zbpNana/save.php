<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('zbpNana')) {$zbp->ShowError(48);die();}

if($_GET['type'] == 'logo' ){
	global $zbp;
	foreach ($_FILES as $key => $value) {
		if(!strpos($key, "_php")){
			if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
				$tmp_name = $_FILES[$key]['tmp_name'];
				$name = $_FILES[$key]['name'];
				@move_uploaded_file($_FILES[$key]['tmp_name'], $zbp->usersdir . 'theme/zbpNana/image/logo.png');
			}
		}
	}
	$zbp->SetHint('good','修改成功LOGO');
	Redirect('main.php?act=tpsz');
}
if($_GET['type'] == 'favicon' ){
	global $zbp;
	foreach ($_FILES as $key => $value) {
		if(!strpos($key, "_php")){
			if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
				$tmp_name = $_FILES[$key]['tmp_name'];
				$name = $_FILES[$key]['name'];
				@move_uploaded_file($_FILES[$key]['tmp_name'], $zbp->usersdir . 'theme/zbpNana/image/favicon.ico');
			}
		}
	}
	$zbp->SetHint('good','修改成功favicon图标');
	Redirect('main.php?act=tpsz');
}
if($_GET['type'] == 'gongzhonghao' ){
	global $zbp;
	foreach ($_FILES as $key => $value) {
		if(!strpos($key, "_php")){
			if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
				$tmp_name = $_FILES[$key]['tmp_name'];
				$name = $_FILES[$key]['name'];
				@move_uploaded_file($_FILES[$key]['tmp_name'], $zbp->usersdir . 'theme/zbpNana/image/gongzhonghao.jpg');
			}
		}
	}
	$zbp->SetHint('good','修改成功页脚二维码');
	Redirect('main.php?act=tpsz');
}
if($_GET['type'] == 'dashang' ){
	global $zbp;
	foreach ($_FILES as $key => $value) {
		if(!strpos($key, "_php")){
			if (is_uploaded_file($_FILES[$key]['tmp_name'])) {
				$tmp_name = $_FILES[$key]['tmp_name'];
				$name = $_FILES[$key]['name'];
				@move_uploaded_file($_FILES[$key]['tmp_name'], $zbp->usersdir . 'theme/zbpNana/image/dashang.jpg');
			}
		}
	}
	$zbp->SetHint('good','修改成功');
	Redirect('main.php?act=tpsz');
}

?>
