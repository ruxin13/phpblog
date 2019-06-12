<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action='root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('Uplist')) {$zbp->ShowError(48);die();}
$mustdo=$_POST['mustdo'];
if($mustdo){
    $ul_id=implode(',',GetVars('ulID'));
    $array = explode(',',$ul_id);
	foreach ($array as $id){
	    $u = $zbp->GetUploadByID($id);
	    $u->Del();
        CountMemberArray(array($u->AuthorID), array(0, 0, 0, -1));
        $u->DelFile();
	}
	echo '批量删除成功！';
}else{
	echo '非法访问！';
}
?>
