<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('zbpNana')) {$zbp->ShowError(48);die();}
$blogtitle = 'zbpNana主题配置';

$act = "";
if ($_GET['act']){
$act = $_GET['act'] == "" ? 'ztsm' : $_GET['act'];
}

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

$percolors = array("C01E22", "0088cc", "FF5E52", "2CDB87", "00D6AC", "EA84FF", "FDAC5F", "FD77B2", "0DAAEA", "C38CFF", "FF926F", "8AC78F", "C7C183");

if(isset($_POST['shouyebuju'])){
	$zbp->Config('zbpNana')->custom_bgcolor = GetVars('bgcolor', 'POST');
	$zbp->Config('zbpNana')->shouyebuju = $_POST['shouyebuju'];
	$zbp->Config('zbpNana')->cebianlanbj = $_POST['cebianlanbj'];
	$zbp->Config('zbpNana')->wenzhanglbybj = $_POST['wenzhanglbybj'];
	$zbp->Config('zbpNana')->wenzhanglbytpbj = $_POST['wenzhanglbytpbj'];
	$zbp->Config('zbpNana')->fanyeanniu = $_POST['fanyeanniu'];
	$zbp->Config('zbpNana')->lianjiefu = $_POST['lianjiefu'];
	$zbp->Config('zbpNana')->Keywords = $_POST['Keywords'];
	$zbp->Config('zbpNana')->Description = $_POST['Description'];
	$zbp->Config('zbpNana')->xgwzkps_kg = $_POST['xgwzkps_kg'];
	$zbp->Config('zbpNana')->xgwz_num = $_POST['xgwz_num'];
	$zbp->Config('zbpNana')->tupianalt = $_POST['tupianalt'];	
	$zbp->Config('zbpNana')->cblbiaoqian = $_POST['cblbiaoqian'];	
$zbp->Config('zbpNana')->cblzhwz_day = $_POST['cblzhwz_day'];
$zbp->Config('zbpNana')->zzbgzh_kg = $_POST['zzbgzh_kg'];
$zbp->Config('zbpNana')->syggl_kg = $_POST['syggl_kg'];
$zbp->Config('zbpNana')->gonggaolan = $_POST['gonggaolan'];
$zbp->Config('zbpNana')->youshangjue = $_POST['youshangjue'];
$zbp->Config('zbpNana')->zuoshangjue = $_POST['zuoshangjue'];
$zbp->Config('zbpNana')->liuyanban = $_POST['liuyanban'];
$zbp->Config('zbpNana')->rementags_url = $_POST['rementags_url'];
$zbp->Config('zbpNana')->rementags_num = $_POST['rementags_num'];
$zbp->Config('zbpNana')->chongfudianzan = $_POST['chongfudianzan'];
$zbp->Config('zbpNana')->banquanxinxi = $_POST['banquanxinxi'];
$zbp->Config('zbpNana')->yejiaoanniu1 = $_POST['yejiaoanniu1'];
$zbp->Config('zbpNana')->yejiaoanniu2 = $_POST['yejiaoanniu2'];
$zbp->Config('zbpNana')->yejiaoxiangguan = $_POST['yejiaoxiangguan'];
$zbp->Config('zbpNana')->baidutongji = $_POST['baidutongji'];
$zbp->Config('zbpNana')->yejiaoewdm = $_POST['yejiaoewdm'];
$zbp->Config('zbpNana')->slsljan = $_POST['slsljan'];
	$zbp->SaveConfig('zbpNana');
	$zbp->ShowHint('good');
}

if(isset($_POST['hdpsz_kg'])){
	$zbp->Config('zbpNana')->hdpsz_dm = $_POST['hdpsz_dm'];
	$zbp->Config('zbpNana')->hdpsz_kg = $_POST['hdpsz_kg'];
	$zbp->SaveConfig('zbpNana');
	$zbp->ShowHint('good');
}

if(isset($_POST['cms_slwz_flid'])){
	$zbp->Config('zbpNana')->cms_zxwz_num = $_POST['cms_zxwz_num'];
	$zbp->Config('zbpNana')->cms_zxwz_eflid = $_POST['cms_zxwz_eflid'];
$zbp->Config('zbpNana')->cms_zxwz_kg = $_POST['cms_zxwz_kg'];
$zbp->Config('zbpNana')->cms_slwz_num = $_POST['cms_slwz_num'];
$zbp->Config('zbpNana')->cms_slwz_flid = $_POST['cms_slwz_flid'];
$zbp->Config('zbpNana')->cms_slwz_kg = $_POST['cms_slwz_kg'];
$zbp->Config('zbpNana')->cms_dlwz_num = $_POST['cms_dlwz_num'];
$zbp->Config('zbpNana')->cms_dlwz_flid = $_POST['cms_dlwz_flid'];
$zbp->Config('zbpNana')->cms_dlwz_kg = $_POST['cms_dlwz_kg'];
$zbp->SaveConfig('zbpNana');
	$zbp->ShowHint('good');
}
if(isset($_POST['wzxg_kg']) || isset($_POST['zhutiseo_kg']) || isset($_POST['wzfx_kg']) || isset($_POST['wlzdnf_kg']) || isset($_POST['zxys_kg'])){
$zbp->Config('zbpNana')->zhutiseo_kg = $_POST['zhutiseo_kg'];
$zbp->Config('zbpNana')->wzlx_kg = $_POST['wzlx_kg'];
$zbp->Config('zbpNana')->wzzy_kg = $_POST['wzzy_kg'];
$zbp->Config('zbpNana')->wzfx_kg = $_POST['wzfx_kg'];
$zbp->Config('zbpNana')->wzds_kg = $_POST['wzds_kg'];
$zbp->Config('zbpNana')->wzdz_kg = $_POST['wzdz_kg'];
$zbp->Config('zbpNana')->wzxg_kg = $_POST['wzxg_kg'];
$zbp->Config('zbpNana')->wlzdnf_kg = $_POST['wlzdnf_kg'];
$zbp->Config('zbpNana')->zxys_kg = $_POST['zxys_kg'];
$zbp->Config('zbpNana')->fltpbj_kg = $_POST['fltpbj_kg'];
$zbp->Config('zbpNana')->wzwlgoto_kg = $_POST['wzwlgoto_kg'];
$zbp->Config('zbpNana')->plwlgoto_kg = $_POST['plwlgoto_kg'];
$zbp->SaveConfig('zbpNana');
	$zbp->ShowHint('good');
}

if(isset($_POST['Displaytb1']) || isset($_POST['Displaytb2'])){
$zbp->Config('zbpNana')->Displaytb1 = $_POST['Displaytb1'];
$zbp->Config('zbpNana')->Displaytb2 = $_POST['Displaytb2'];
$zbp->Config('zbpNana')->tbbt1 = $_POST['tbbt1'];
$zbp->Config('zbpNana')->tbbt2 = $_POST['tbbt2'];
$zbp->Config('zbpNana')->tbbt3 = $_POST['tbbt3'];
$zbp->Config('zbpNana')->tbbt4 = $_POST['tbbt4'];
$zbp->Config('zbpNana')->tbbt5 = $_POST['tbbt5'];
$zbp->Config('zbpNana')->tbbt6 = $_POST['tbbt6'];
$zbp->Config('zbpNana')->tbtp1 = $_POST['tbtp1'];
$zbp->Config('zbpNana')->tbtp2 = $_POST['tbtp2'];
$zbp->Config('zbpNana')->tbtp3 = $_POST['tbtp3'];
$zbp->Config('zbpNana')->tbtp4 = $_POST['tbtp4'];
$zbp->Config('zbpNana')->tbtp5 = $_POST['tbtp5'];
$zbp->Config('zbpNana')->tbtp6 = $_POST['tbtp6'];
$zbp->Config('zbpNana')->tblj1 = $_POST['tblj1'];
$zbp->Config('zbpNana')->tblj2 = $_POST['tblj2'];
$zbp->Config('zbpNana')->tblj3 = $_POST['tblj3'];
$zbp->Config('zbpNana')->tblj4 = $_POST['tblj4'];
$zbp->Config('zbpNana')->tblj5 = $_POST['tblj5'];
$zbp->Config('zbpNana')->tblj6 = $_POST['tblj6'];	
$zbp->SaveConfig('zbpNana');
	$zbp->ShowHint('good');
}
if(isset($_POST['Displaypldj'])){
$zbp->Config('zbpNana')->Displaypldj = $_POST['Displaypldj'];
$zbp->Config('zbpNana')->glyadmin = $_POST['glyadmin'];
$zbp->Config('zbpNana')->glych = $_POST['glych'];
$zbp->Config('zbpNana')->pldjch1 = $_POST['pldjch1'];
$zbp->Config('zbpNana')->pldjch2 = $_POST['pldjch2'];
$zbp->Config('zbpNana')->pldjch3 = $_POST['pldjch3'];
$zbp->Config('zbpNana')->pldjch4 = $_POST['pldjch4'];
$zbp->Config('zbpNana')->pldjch5 = $_POST['pldjch5'];
$zbp->Config('zbpNana')->pldjch6 = $_POST['pldjch6'];
$zbp->Config('zbpNana')->pldjch7 = $_POST['pldjch7'];
$zbp->Config('zbpNana')->pldjch8 = $_POST['pldjch8'];
$zbp->Config('zbpNana')->pldjch9 = $_POST['pldjch9'];
$zbp->SaveConfig('zbpNana');
	$zbp->ShowHint('good');
}
if(isset($_POST['DisplayAd1']) || isset($_POST['DisplayAd2']) || isset($_POST['DisplayAd3']) || isset($_POST['DisplayAd4']) || isset($_POST['DisplayAd5']) || isset($_POST['DisplayAd6'])){
$zbp->Config('zbpNana')->Ad1 = $_POST['Ad1'];
$zbp->Config('zbpNana')->Ad2 = $_POST['Ad2'];
$zbp->Config('zbpNana')->Ad3 = $_POST['Ad3'];
$zbp->Config('zbpNana')->Ad4 = $_POST['Ad4'];
$zbp->Config('zbpNana')->Ad5 = $_POST['Ad5'];
$zbp->Config('zbpNana')->Ad6 = $_POST['Ad6'];
$zbp->Config('zbpNana')->Adm1 = $_POST['Adm1'];
$zbp->Config('zbpNana')->Adm2 = $_POST['Adm2'];
$zbp->Config('zbpNana')->Adm3 = $_POST['Adm3'];
$zbp->Config('zbpNana')->Adm4 = $_POST['Adm4'];
$zbp->Config('zbpNana')->Adm5 = $_POST['Adm5'];
$zbp->Config('zbpNana')->Adm6 = $_POST['Adm6'];
$zbp->Config('zbpNana')->DisplayAd1 = $_POST['DisplayAd1'];
$zbp->Config('zbpNana')->DisplayAd2 = $_POST['DisplayAd2'];
$zbp->Config('zbpNana')->DisplayAd3 = $_POST['DisplayAd3'];
$zbp->Config('zbpNana')->DisplayAd4 = $_POST['DisplayAd4'];
$zbp->Config('zbpNana')->DisplayAd5 = $_POST['DisplayAd5'];
$zbp->Config('zbpNana')->DisplayAd6 = $_POST['DisplayAd6'];
$zbp->SaveConfig('zbpNana');
	$zbp->ShowHint('good');
}
?>

<link href="source/colpick.css" rel="stylesheet" /> 
<script src="source/colpick.js" type="text/javascript"></script>
<style>
input.colorpicker { 
border-right-width: 25px; 
width: 84px; 
height: 25px;
line-height:25px;
cursor: pointer; 
font-family: 'Lucida Console', Monaco, monospace;
box-sizing: border-box;
padding:0;
margin:0;
float:left;
}
.color-box {
float:left;
width:30px;
height:30px;
margin:5px;
border: 1px solid white;
cursor: pointer; 
box-sizing: border-box;
}
.color-box-picker{ 	
margin: 8px 10px;
border: 1px solid #aaa; width: 86px;height: 27px;
}
</style>
<!--#include file="..\..\..\..\zb_system\admin\admin_top.asp"-->
<div id="divMain">
	<div class="divHeader"><?php echo $blogtitle;?></div>
	<div class="SubMenu">
	<?php zbpNana_SubMenu($act);?>
     <a href="https://yigujin.cn/" target="_blank"><span class="m-right">技术支持</span></a>
    </div>
	<div id="divMain2"> 
	<?php if ($act == 'tpsz') { ?>
<table id="form1" name="form1" width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
<tr>
    <th width="30%"><p align="center">图片名称</p></th>
    <th width="20%"><p align="center">当前图片</p></th>
	<th width="50%"><p align="center">上传文件</p></th>
  </tr>
  <form enctype="multipart/form-data" method="post" action="save.php?type=logo">
	<tr>
    <td><p align="center">LOGO图片（300X70），命名logo.png</p></td>
	<td>
	<p align="center"><img src="<?php if(file_exists("image/logo.png")){echo "image/logo.png";}else{echo "image/logo1.png";}?>" height="40px"></p>
	</td>
	<td><p align="center"><input name="logo.png" type="file"/><input name="" type="Submit" class="button" value="保存"/></p></td>
	</tr>
	</form> 
  <form enctype="multipart/form-data" method="post" action="save.php?type=favicon">
	<tr>
    <td><p align="center">favicon图标（16X16），命名favicon.ico</p></td>
	<td>
	<p align="center"><img src="<?php if(file_exists("image/favicon.ico")){echo "image/favicon.ico";}else{echo "image/favicon1.ico";}?>" height="40px"></p>
	</td>
	<td><p align="center"><input name="favicon.ico" type="file"/><input name="" type="Submit" class="button" value="保存"/></p></td>
	</tr>
	</form>
	  <form enctype="multipart/form-data" method="post" action="save.php?type=gongzhonghao">
	<tr>
    <td><p align="center">页脚二维码（280X280），命名gongzhonghao.jpg</p></td>
	<td>
	<p align="center"><img src="<?php if(file_exists("image/gongzhonghao.jpg")){echo "image/gongzhonghao.jpg";}else{echo "image/gongzhonghao1.jpg";}?>" height="40px"></p>
	</td>
	<td><p align="center"><input name="gongzhonghao.jpg" type="file"/><input name="" type="Submit" class="button" value="保存"/></p></td>
	</tr>
	</form>
	  <form enctype="multipart/form-data" method="post" action="save.php?type=dashang">
	<tr>
    <td><p align="center">打赏二维码（452X299），命名dashang.jpg</p></td>
	<td>
	<p align="center"><img src="<?php if(file_exists("image/dashang.jpg")){echo "image/dashang.jpg";}else{echo "image/dashang1.jpg";}?>" height="40px"></p>
	</td>
	<td><p align="center"><input name="dashang.jpg" type="file"/><input name="" type="Submit" class="button" value="保存"/></p></td>
	</tr>
	</form>
</table>
<?php }if ($act == 'jbsz') { ?>
<form id="form2" name="form2" method="post">	
    <table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
		<tr>
			<th width="15%"><p align="center">项目名称</p></th>
			<th width="50%"><p align="center">文本/代码</p></th>
			<th width="25%"><p align="center">说明</p></th>
		</tr>
		<tr>
		<td><p align="center">颜色风格</p></td>
		<td colspan="2">
					<div id="loadconfig">				
					<?php
						foreach ($percolors as $value) {
							  echo "<div class='color-box' data-color='" . $value . "' style='background-color:#" . $value . "'></div>";
						}
					?>
					</div>
					</td>
		</tr>

				<tr>
					<td><p align="center">自选颜色</p></td>
					<td>
						<div class="color-box-picker">
							<input type="text" id="bgpicker" class="colorpicker" name="bgcolor" value="<?php echo $zbp->Config('zbpNana')->custom_bgcolor;?>" style="border-color:#<?php echo $zbp->Config('zbpNana')->custom_bgcolor;?>" />
						</div>
					</td>
					<td><p align="left">选择站点颜色风格</p></td>
				</tr>		
				<tr>
					<td><label for="shouyebuju"><p align="center">首页布局</p></label></td>					
					<td ><p align="left">
						<label><input type="radio" id="sybj1" name="shouyebuju" value="1" <?php echo $zbp->Config('zbpNana')->shouyebuju ==1 ? 'checked="checked"' : '';?>/>博客布局</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="sybj2" name="shouyebuju" value="2" <?php echo $zbp->Config('zbpNana')->shouyebuju ==2 ? 'checked="checked"' : '';?>/>CMS 布局</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="sybj3" name="shouyebuju" value="3" <?php echo $zbp->Config('zbpNana')->shouyebuju ==3 ? 'checked="checked"' : '';?>/>图片布局</label>
					</p></td>
					<td><p align="left">选择站点首页布局，默认博客布局</p></td>
				</tr>
				<tr>
					<td><label for="cebianlanbj"><p align="center">侧边栏布局</p></label></td>					
					<td ><p align="left">
						<label><input type="radio" id="cblbj1" name="cebianlanbj" value="1" <?php echo $zbp->Config('zbpNana')->cebianlanbj ==1 ? 'checked="checked"' : '';?>/>居右布局</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="cblbj2" name="cebianlanbj" value="2" <?php echo $zbp->Config('zbpNana')->cebianlanbj ==2 ? 'checked="checked"' : '';?>/>居左布局</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="cblbj3" name="cebianlanbj" value="3" <?php echo $zbp->Config('zbpNana')->cebianlanbj ==3 ? 'checked="checked"' : '';?>/>无侧边栏布局</label>
					</p></td>
					<td><p align="left">选择站点侧边布局，默认居右布局</p></td>
				</tr>
				<tr>
					<td><label for="wenzhanglbybj"><p align="center">博客、文章列表页布局</p></label></td>					
					<td ><p align="left">
						<label><input type="radio" id="wzlbbj1" name="wenzhanglbybj" value="1" <?php echo $zbp->Config('zbpNana')->wenzhanglbybj ==1 ? 'checked="checked"' : '';?>/>紧凑型布局</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="wzlbbj2" name="wenzhanglbybj" value="2" <?php echo $zbp->Config('zbpNana')->wenzhanglbybj ==2 ? 'checked="checked"' : '';?>/>宽松型布局</label>
					</p></td>
					<td><p align="left">在博客布局和文章列表页非图片布局情况下的上下之间布局，默认紧凑型布局</p></td>
				</tr>
				<tr>
					<td><label for="wenzhanglbytpbj"><p align="center">博客、文章列表页图片的布局</p></label></td>					
					<td ><p align="left">
						<label><input type="radio" id="wzlbtpbj1" name="wenzhanglbytpbj" value="1" <?php echo $zbp->Config('zbpNana')->wenzhanglbytpbj ==1 ? 'checked="checked"' : '';?>/>居左布局</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="wzlbtpbj2" name="wenzhanglbytpbj" value="2" <?php echo $zbp->Config('zbpNana')->wenzhanglbytpbj ==2 ? 'checked="checked"' : '';?>/>居右布局</label>
					</p></td>
					<td><p align="left">在博客布局和文章列表页非图片布局情况下的图片位置布局，默认居左布局</p></td>
				</tr>
				<tr>
					<td><label for="fanyeanniu"><p align="center">列表翻页按钮</p></label></td>					
					<td ><p align="left">
						<label><input type="radio" id="lbfyan1" name="fanyeanniu" value="1" <?php echo $zbp->Config('zbpNana')->fanyeanniu ==1 ? 'checked="checked"' : '';?>/>标准按钮</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="lbfyan2" name="fanyeanniu" value="2" <?php echo $zbp->Config('zbpNana')->fanyeanniu ==2 ? 'checked="checked"' : '';?>/>人工加载</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="lbfyan3" name="fanyeanniu" value="3" <?php echo $zbp->Config('zbpNana')->fanyeanniu ==3 ? 'checked="checked"' : '';?>/>自动加载</label>
					</p></td>
					<td><p align="left">人工和自动加载采用AJAX翻页，默认标准按钮</p></td>
				</tr>
				<tr>
					<td><label for="lianjiefu"><p align="center">链接符 <?php echo $zbp->Config('zbpNana')->lianjiefu;?></p></label></td>					
					<td ><p align="left">
						<label><input type="radio" id="ljf1" name="lianjiefu" value="|" <?php echo ($zbp->Config('zbpNana')->lianjiefu =='|' ? 'checked="checked"' : '');?>/>竖线"|"</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="ljf2" name="lianjiefu" value="-" <?php echo ($zbp->Config('zbpNana')->lianjiefu =='-' ? 'checked="checked"' : '');?>/>中横杠"-"</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="ljf3" name="lianjiefu" value="_" <?php echo ($zbp->Config('zbpNana')->lianjiefu =='_' ? 'checked="checked"' : '');?>/>下划线"_"</label>
					</p></td>
					<td><p align="left">选择站点SEO标题链接符</p></td>
				</tr>
			<td><label for="Keywords"><p align="center">站点关键词</p></label></td>
			<td><p align="left"><textarea name="Keywords" type="text" id="Keywords" rows="2" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Keywords;?></textarea></p></td>
			<td><p align="left">填写站点关键词，多个英文逗号隔开</p></td>
		</tr>
		<tr>
			 <td><label for="Description"><p align="center">站点描述</p></label></td>
			<td><p align="left"><textarea name="Description" type="text" id="Description" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Description;?></textarea></p></td>
			<td><p align="left">填写站点描述</p></td>
		</tr>
		<tr>
			 <td><label for="xiangguanshezhi"><p align="center">相关文章设置</p></label></td>
			<td><p align="left"><label>是否变更为卡片式：<input type="text" id="xgwzkps_kg" name="xgwzkps_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->xgwzkps_kg;?>"/></label><br/><label>相关文章篇数：<input style="width:98%" type="text" name="xgwz_num" value="<?php echo $zbp->Config('zbpNana')->xgwz_num;?>" /></label>
			</p></td>
			<td><p align="left">默认为列表式，可变更为卡片式，篇数建议为偶数，如卡片式建议为6篇</p></td>
		</tr>
				<tr>
					<td><label for="tupianalt"><p align="center">图片ALT属性</p></label></td>					
					<td ><p align="left">
						<label><input type="radio" id="tupianalt1" name="tupianalt" value="1" <?php echo $zbp->Config('zbpNana')->tupianalt ==1 ? 'checked="checked"' : '';?>/>智能添加</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="tupianalt2" name="tupianalt" value="2" <?php echo $zbp->Config('zbpNana')->tupianalt ==2 ? 'checked="checked"' : '';?>/>强制添加</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="tupianalt3" name="tupianalt" value="3" <?php echo $zbp->Config('zbpNana')->tupianalt ==3 ? 'checked="checked"' : '';?>/>保持不变</label>
					</p></td>
					<td><p align="left">智能添加是缺啥补啥，如缺alt就补alt，缺title就补tilte；强制添加就是强制所有图片ALT为文章标题</p></td>
				</tr>
		<tr>
					<td><label for="cblbiaoqian"><p align="center">侧边栏标签云</p></label></td>					
					<td ><p align="left">
						<label><input type="radio" id="cblbqy1" name="cblbiaoqian" value="1" <?php echo $zbp->Config('zbpNana')->cblbiaoqian ==1 ? 'checked="checked"' : '';?>/>默认标签云</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="cblbqy2" name="cblbiaoqian" value="2" <?php echo $zbp->Config('zbpNana')->cblbiaoqian ==2 ? 'checked="checked"' : '';?>/>彩色标签云</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="cblbqy3" name="cblbiaoqian" value="3" <?php echo $zbp->Config('zbpNana')->cblbiaoqian ==3 ? 'checked="checked"' : '';?>/>3D标签云</label>
					</p></td>
					<td><p align="left">切换不同标签云后需要到模块管理中编辑更新标签列表才行</p></td>
				</tr>
		<tr>
			 <td><label for="xiangguanshezhi"><p align="center">侧边栏综合文章</p></label></td>
			<td><p align="left"><label>是否变更侧边栏作者列表为综合文章：<input type="text" id="zzbgzh_kg" name="zzbgzh_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->zzbgzh_kg;?>"/></label><br/>
			<label>热评热门文章统计天数：<input style="width:60px;" type="text" name="cblzhwz_day" value="<?php echo $zbp->Config('zbpNana')->cblzhwz_day;?>" /></label>
			</p></td>
			<td><p align="left">侧边栏模块综合文章（站长推荐、热门文章和热评文章）</p></td>
		</tr>
		<tr>
			 <td><label for="gonggaolan"><p align="center">首页公告栏</p></label></td>
			<td><p align="left"><label>是否关闭首页公告栏：<input type="text" id="syggl_kg" name="syggl_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->syggl_kg;?>"/></label><br/><textarea name="gonggaolan" type="text" id="gonggaolan" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->gonggaolan;?></textarea></p></td>
			<td><p align="left">填写首页公告栏滚动内容</p></td>
		</tr>
		<tr>
			 <td><label for="youshangjue"><p align="center">右上角菜单</p></label></td>
			<td><p align="left"><textarea name="youshangjue" type="text" id="youshangjue" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->youshangjue;?></textarea></p></td>
			<td><p align="left">填写站点右上角菜单</p></td>
		</tr>
		<tr>
			 <td><label for="zuoshangjue"><p align="center">欢迎语</p></label></td>
			<td><p align="left"><textarea name="zuoshangjue" type="text" id="zuoshangjue" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->zuoshangjue;?></textarea></p></td>
			<td><p align="left">填写站点左上角欢迎语</p></td>
		</tr>
		<tr>
			 <td><label for="liuyanban"><p align="center">留言板地址</p></label></td>
			<td><p align="left"><textarea name="liuyanban" type="text" id="liuyanban" style="width:98%;"><?php echo $zbp->Config('zbpNana')->liuyanban;?></textarea></p></td>
			<td><p align="left">填写留言板地址，非日志页悬浮直达留言板按钮</p></td>
		</tr>
		<tr>
			 <td><label for="rementags"><p align="center">搜索框热门标签</p></label></td>
			<td><p align="left">
			<label>标签地址：<input style="width:98%;" type="text" name="rementags_url" value="<?php echo $zbp->Config('zbpNana')->rementags_url;?>" /></label><br/>
			<label>显示标签数：<input style="width:30%;" type="text" name="rementags_num" value="<?php echo $zbp->Config('zbpNana')->rementags_num;?>" /></label></p></td>
			<td><p align="left">填写弹出搜索框热门标签地址及显示标签数，菜单搜索框中用到</p></td>
		</tr>
		<tr>
			 <td><label for="chongfudianzan"><p align="center">重复点赞提示</p></label></td>
			<td><p align="left"><textarea name="chongfudianzan" type="text" id="chongfudianzan" style="width:98%;"><?php echo $zbp->Config('zbpNana')->chongfudianzan;?></textarea></p></td>
			<td><p align="left">填写日志页重复点赞提示内容</p></td>
		</tr>
		<tr>
			 <td><label for="banquanxinxi"><p align="center">页脚版权信息</p></label></td>
			<td><p align="left"><textarea name="banquanxinxi" type="text" id="banquanxinxi" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->banquanxinxi;?></textarea></p></td>
			<td><p align="left">版权信息不建议太长，建议为站点名称</p></td>
		</tr>
		<tr>
			 <td><label for="yejiaoanniu1"><p align="center">页脚按钮1链接</p></label></td>
			<td><p align="left"><textarea name="yejiaoanniu1" type="text" id="yejiaoanniu1" style="width:98%;"><?php echo $zbp->Config('zbpNana')->yejiaoanniu1;?></textarea></p></td>
			<td><p align="left">填写页脚右下角关注我们按钮1链接</p></td>
		</tr>
		<tr>
			 <td><label for="yejiaoanniu2"><p align="center">页脚按钮2链接</p></label></td>
			<td><p align="left"><textarea name="yejiaoanniu2" type="text" id="yejiaoanniu2" style="width:98%;"><?php echo $zbp->Config('zbpNana')->yejiaoanniu2;?></textarea></p></td>
			<td><p align="left">填写页脚右下角关注我们按钮2链接</p></td>
		</tr>
		<tr>
			 <td><label for="yejiaoxiangguan"><p align="center">页脚相关链接</p></label></td>
			<td><p align="left"><textarea name="yejiaoxiangguan" type="text" id="yejiaoxiangguan" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->yejiaoxiangguan;?></textarea></p></td>
			<td><p align="left">填写页脚站点相关链接</p></td>
		</tr>
		<tr>
			 <td><label for="baidutongji"><p align="center">页头额外代码</p></label></td>
			<td><p align="left"><textarea name="baidutongji" type="text" id="baidutongji" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->baidutongji;?></textarea></p></td>
			<td><p align="left">在[/head]之前填写的代码，如百度统计代码</p></td>
		</tr>
		<tr>
			 <td><label for="yejiaoewdm"><p align="center">页脚额外代码</p></label></td>
			<td><p align="left"><textarea name="yejiaoewdm" type="text" id="yejiaoewdm" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->yejiaoewdm;?></textarea></p></td>
			<td><p align="left">在[/body]之前填写的代码，如百度、360推送的JS代码</p></td>
		</tr>
	<tr>
			 <td><label for="slsljan"><p align="center">404页面链接按钮</p></label></td>
			<td><p align="left"><textarea name="slsljan" type="text" id="slsljan" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->slsljan;?></textarea></p></td>
			<td><p align="left">在404页面显示的链接按钮</p></td>
		</tr>
	</table>
	<br />
	<input name="" type="Submit" class="button" style="margin-top:10px;padding:0 auto;" value="保存"/>
</form>
<?php } if ($act == 'gnkg'){
	?>
<form id="form3" name="form3" method="post">	
<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
<tr>
<th width="33%"><p align="center">是否启用主题SEO功能<br><input type="text" id="zhutiseo_kg" name="zhutiseo_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->zhutiseo_kg;?>"/></p></th>
<th width="33%"><p align="center">是否启用文章类型<br><input type="text" id="wzlx_kg" name="wzlx_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->wzlx_kg;?>"/></p></th>
<th width="33%"><p align="center">是否启用文章摘要<br><input type="text" id="wzzy_kg" name="wzzy_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->wzzy_kg;?>"/></p></th>
</tr>
<tr>
<th width="33%"><p align="center">是否启用文章分享<br><input type="text" id="wzfx_kg" name="wzfx_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->wzfx_kg;?>"/></p></th>
<th width="33%"><p align="center">是否启用文章打赏<br><input type="text" id="wzds_kg" name="wzds_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->wzds_kg;?>"/></p></th>
<th width="33%"><p align="center">是否启用文章点赞<br><input type="text" id="wzdz_kg" name="wzdz_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->wzdz_kg;?>"/></p></th>
</tr>
<tr>
<th width="33%"><p align="center">是否启用相关文章<br><input type="text" id="wzxg_kg" name="wzxg_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->wzxg_kg;?>"/></p></th>
<th width="33%"><p align="center">是否启用自选颜色<br><input type="text" id="zxys_kg" name="zxys_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->zxys_kg;?>"/></p></th>
<th width="33%"><p align="center">是否启用分类图片布局<br><input type="text" id="fltpbj_kg" name="fltpbj_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->fltpbj_kg;?>"/></p></th>
</tr>
<tr>
<th width="33%"><p align="center">是否启用文章外链添加nofollow<br><input type="text" id="wlzdnf_kg" name="wlzdnf_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->wlzdnf_kg;?>"/></p></th>
<th width="33%"><p align="center">是否启用文章外链goto跳转<br><input type="text" id="wzwlgoto_kg" name="wzwlgoto_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->wzwlgoto_kg;?>"/></p></th>
<th width="33%"><p align="center">是否启用评论链接goto跳转<br><input type="text" id="plwlgoto_kg" name="plwlgoto_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->plwlgoto_kg;?>"/></p></th>
</tr>
</table>
<br />
	<input name="" type="Submit" class="button" value="保存"/>
		</form>

<?php } if ($act == 'ztsm'){
	?>
<form id="form4" name="form4" method="post">	
<table name="form1" width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
	<tr><td>
		<p>1、zbpNana主题是根据本人的<a href="https://yigujin.cn/nana/" target="_blank">WP响应式主题Nana</a>编译而来，zbpNana主题支持一键切换博客布局、CMS布局和图片布局，还支持一键切换颜色风格！</p>
		<p>2、zbpNana主题发布页和使用说明，请移步到 <a href="https://yigujin.cn/zbpnana/" target="_blank">主题使用说明</a>查阅</p>
		<p>3、启用主题后模块中的控制面板、搜索、最近发表、最新留言、标签列表、作者列表等模块已经重建过，所以需要直接编辑提交方可生效。</p>
		<p>4、启用主题后，请根据zbpNana主题配置相关项目进行设置，每一个选项都配有说明，部分项目也设置有默认内容，请根据内容修改即可。特别是『功能开关』配置中，建议根据需求把相关功能开启，建议全开启。如果选择CMS布局，请继续设置CMS相关项目，其中双栏文章的分类ID一定要是双数才行，就是需要两个或四个及以上的分类，要不然会错位；如果选择图片布局，记得到『网站设置』中的『页面设置』对列表页数量改为12的倍数，如12篇，或24篇等。</p>
		<p>5、首页、分类目录页使用默认侧边栏（侧边栏1），文章页、页面使用侧边栏2。</p>
		<p>6、免费主题请保留主题版权及链接，如需去除版权请赞助20元版权费，并可加入懿古今主题交流群（477678587），赞助后请联系本人（QQ：2226524923）邀请加入。</p>
	</td></tr>	
</table>
</form>

<?php } if ($act == 'cmssz') { ?>
<form id="form5" name="form5" method="post">	
<table width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
		<tr>
			<th width="15%"><p align="center">项目名称</p></th>
			<th width="50%"><p align="center">篇数/ID</p></th>
			<th width="25%"><p align="center">开关</p></th>
		</tr>
	    <tr>
		<td><p align="center">最新文章</p></td>
		<td><label>显示篇数：<input style="width:30px;margin-left:10px;text-align:center;" type="text" name="cms_zxwz_num" value="<?php echo $zbp->Config('zbpNana')->cms_zxwz_num;?>" /></label><br/>
			<label>显示的分类ID（多个英文逗号隔开）：<input style="width:60%" type="text" name="cms_zxwz_eflid" value="<?php echo $zbp->Config('zbpNana')->cms_zxwz_eflid;?>" /></label>
					</td>
		<td><p align="left"><input type="text" id="cms_zxwz_kg" name="cms_zxwz_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->cms_zxwz_kg;?>"/></p></td>
		</tr>
	    <tr>
		<td><p align="center">双栏文章</p></td>
		<td><label>显示篇数（建议6篇）：<input style="width:30px;margin-left:10px;text-align:center;" type="text" name="cms_slwz_num" value="<?php echo $zbp->Config('zbpNana')->cms_slwz_num;?>" /></label><br/>
			<label>分类ID（多个英文逗号隔开）：<input style="width:60%" type="text" name="cms_slwz_flid" value="<?php echo $zbp->Config('zbpNana')->cms_slwz_flid;?>" /></label>
					</td>
		<td><p align="left"><input type="text" id="cms_slwz_kg" name="cms_slwz_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->cms_slwz_kg;?>"/></p></td>
		</tr>
	    <tr>
		<td><p align="center">单栏文章</p></td>
		<td><label>显示篇数（建议7篇）：<input style="width:30px;margin-left:10px;text-align:center;" type="text" name="cms_dlwz_num" value="<?php echo $zbp->Config('zbpNana')->cms_dlwz_num;?>" /></label><br/>
			<label>分类ID（多个英文逗号隔开）：<input style="width:60%" type="text" name="cms_dlwz_flid" value="<?php echo $zbp->Config('zbpNana')->cms_dlwz_flid;?>" /></label>
					</td>
		<td><p align="left"><input type="text" id="cms_dlwz_kg" name="cms_dlwz_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->cms_dlwz_kg;?>"/></p></td>
		</tr>		
		
	</table>
	<br />
	<input name="" type="Submit" class="button" style="margin-top:10px;padding:0 auto;" value="保存"/>
</form>

<?php } if ($act == 'absz'){
	?>
	<form id="form6" name="form6" method="post">	
	<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
	<tr>
		<th width="15%"><p align="center">AD编号</p></th>
		<th width="40%"><p align="center">广告代码</p></th>
		<th width="10%"><p align="center">是否开启</p></th>
		<th width="25%"><p align="center">备注</p></th>
	</tr>
	<tr>
		<td><label for="Ad1"><p align="center">导航栏下方广告位</p></label></td>
		<td><p align="left">PC端：<br/><textarea name="Ad1" type="text" id="Ad1" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Ad1;?></textarea><br/>移动端：<br/><textarea name="Adm1" type="text" id="Adm1" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Adm1;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplayAd1" name="DisplayAd1" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->DisplayAd1;?>" /></p></td>
		<td><p align="left">位置：首页导航栏下方广告位，宽1078，高随意</p></td>
	</tr>
	<tr>
		<td><label for="Ad2"><p align="center">文章列表第1篇文章后广告位</p></label></td>
		<td><p align="left">PC端：<br/><textarea name="Ad2" type="text" id="Ad2" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Ad2;?></textarea><br/>移动端：<br/><textarea name="Adm2" type="text" id="Adm2" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Adm2;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplayAd2" name="DisplayAd2" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->DisplayAd2;?>" /></p></td>
		<td><p align="left">位置：文章列表第1篇和第2篇文章中间位置，宽778，高随意</p></td>
	</tr>
	<tr>
		<td><label for="Ad3"><p align="center">文章列表第5篇文章后广告位</p></label></td>
		<td><p align="left">PC端：<br/><textarea name="Ad3" type="text" id="Ad3" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Ad3;?></textarea><br/>移动端：<br/><textarea name="Adm3" type="text" id="Adm3" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Adm3;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplayAd3" name="DisplayAd3" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->DisplayAd3;?>" /></p></td>
		<td><p align="left">位置：文章列表第5篇和第6篇文章中间位置，宽778，高随意</p></td>
	</tr>	
		<tr>
		<td><label for="Ad4"><p align="center">文章标题下方广告位</p></label></td>
		<td><p align="left">PC端：<br/><textarea name="Ad4" type="text" id="Ad4" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Ad4;?></textarea><br/>移动端：<br/><textarea name="Adm4" type="text" id="Adm4" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Adm4;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplayAd4" name="DisplayAd4" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->DisplayAd4;?>" /></p></td>
		<td><p align="left">位置：文章页标题下方，正文上方位置，宽728，高随意</p></td>
	</tr>
	<tr>
		<td><label for="Ad5"><p align="center">相关文章上方广告位</p></label></td>
		<td><p align="left">PC端：<br/><textarea name="Ad5" type="text" id="Ad5" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Ad5;?></textarea><br/>移动端：<br/><textarea name="Adm5" type="text" id="Adm5" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Adm5;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplayAd5" name="DisplayAd5" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->DisplayAd5;?>" /></p></td>
		<td><p align="left">位置：文章页正文下方，相关文章上方位置，宽778，高随意</p></td>
	</tr>
	<tr>
		<td><label for="Ad6"><p align="center">评论上方广告位</p></label></td>
		<td><p align="left">PC端：<br/><textarea name="Ad6" type="text" id="Ad6" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Ad6;?></textarea><br/>移动端：<br/><textarea name="Adm6" type="text" id="Adm6" rows="4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->Adm6;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplayAd6" name="DisplayAd6" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->DisplayAd6;?>" /></p></td>
		<td><p align="left">位置：文章页相关文章下方评论上方位置，宽778，高随意</p></td>
	</tr>	
</table>
	<br />
	<input name="" type="Submit" class="button" value="保存"/>
		</form>
<?php } if ($act == 'taobao'){
	?>
	<form id="form77" name="form77" method="post">	
	<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
	<tr>
		<th width="15%"><p align="center">编号</p></th>
		<th width="50%"><p align="center">开关代码</p></th>
		<th width="25%"><p align="center">备注</p></th>
	</tr>
	<tr>
		<td><label for="tb"><p align="center">广告图片轮播</p></label></td>
		<td><p align="left">CMS首页是否开启：<input type="text" id="Displaytb1" name="Displaytb1" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->Displaytb1;?>" /><br/>文章页是否开启：<input type="text" id="Displaytb2" name="Displaytb2" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->Displaytb2;?>" /></p></td>
		<td><p align="left">位于CMS布局和相关文章上方，6个位置都需要填写内容</p></td>
	</tr>
	<tr>
		<td><label for="tb1"><p align="center">位置1</p></label></td>
		<td><p align="left">标题1：<br/><textarea name="tbbt1" type="text" id="tbbt1" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tbbt1;?></textarea><br/>图片地址1：<br/><textarea name="tbtp1" type="text" id="tbtp1" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tbtp1;?></textarea>链接地址1：<br/><textarea name="tblj1" type="text" id="tblj1" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tblj1;?></textarea></p></td>
		<td><p align="left">广告图片轮播一个位置</p></td>
	</tr>
		<tr>
		<td><label for="tb2"><p align="center">位置2</p></label></td>
		<td><p align="left">标题2：<br/><textarea name="tbbt2" type="text" id="tbbt2" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tbbt2;?></textarea><br/>图片地址2：<br/><textarea name="tbtp2" type="text" id="tbtp2" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tbtp2;?></textarea>链接地址2：<br/><textarea name="tblj2" type="text" id="tblj2" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tblj2;?></textarea></p></td>
		<td><p align="left">广告图片轮播二个位置</p></td>
	</tr>
		<tr>
		<td><label for="tb3"><p align="center">位置3</p></label></td>
		<td><p align="left">标题3：<br/><textarea name="tbbt3" type="text" id="tbbt3" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tbbt3;?></textarea><br/>图片地址3：<br/><textarea name="tbtp3" type="text" id="tbtp3" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tbtp3;?></textarea>链接地址3：<br/><textarea name="tblj3" type="text" id="tblj3" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tblj3;?></textarea></p></td>
		<td><p align="left">广告图片轮播三个位置</p></td>
	</tr>
			<tr>
		<td><label for="tb4"><p align="center">位置4</p></label></td>
		<td><p align="left">标题4：<br/><textarea name="tbbt4" type="text" id="tbbt4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tbbt4;?></textarea><br/>图片地址4：<br/><textarea name="tbtp4" type="text" id="tbtp4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tbtp4;?></textarea>链接地址4：<br/><textarea name="tblj4" type="text" id="tblj4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tblj4;?></textarea></p></td>
		<td><p align="left">广告图片轮播四个位置</p></td>
	</tr>
			<tr>
		<td><label for="tb5"><p align="center">位置5</p></label></td>
		<td><p align="left">标题5：<br/><textarea name="tbbt5" type="text" id="tbbt5" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tbbt5;?></textarea><br/>图片地址5：<br/><textarea name="tbtp5" type="text" id="tbtp5" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tbtp5;?></textarea>链接地址5：<br/><textarea name="tblj5" type="text" id="tblj5" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tblj5;?></textarea></p></td>
		<td><p align="left">广告图片轮播五个位置</p></td>
	</tr>
			<tr>
		<td><label for="tb6"><p align="center">位置6</p></label></td>
		<td><p align="left">标题6：<br/><textarea name="tbbt6" type="text" id="tbbt6" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tbbt6;?></textarea><br/>图片地址6：<br/><textarea name="tbtp6" type="text" id="tbtp6" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tbtp6;?></textarea>链接地址6：<br/><textarea name="tblj6" type="text" id="tblj6" style="width:98%;"><?php echo $zbp->Config('zbpNana')->tblj6;?></textarea></p></td>
		<td><p align="left">广告图片轮播六个位置</p></td>
	</tr>
</table>
	<br />
	<input name="" type="Submit" class="button" value="保存"/>
		</form>
<?php } if ($act == 'dengji'){
	?>
	<form id="form78" name="form78" method="post">	
	<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
	<tr>
		<th width="15%"><p align="center">等级</p></th>
		<th width="50%"><p align="center">开关\称号</p></th>
		<th width="25%"><p align="center">备注</p></th>
	</tr>
	<tr>
		<td><label for="pldj"><p align="center">评论等级设置</p></label></td>
		<td><p align="left">是否开启：<input type="text" id="Displaypldj" name="Displaypldj" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->Displaypldj;?>" /></p></td>
		<td><p align="left">评论等级位于评论昵称后面，默认不开启</p></td>
	</tr>
	<tr>
		<td><label for="gly"><p align="center">管理员等级</p></label></td>
		<td><p align="left">管理员邮箱：<br/><textarea name="glyadmin" type="text" id="glyadmin" style="width:98%;"><?php echo $zbp->Config('zbpNana')->glyadmin;?></textarea><br/>管理员称号：<br/><textarea name="glych" type="text" id="glych" style="width:98%;"><?php echo $zbp->Config('zbpNana')->glych;?></textarea></p></td>
		<td><p align="left">比如：站长</p></td>
	</tr>
		<tr>
		<td><label for="pldjch1"><p align="center">评论者等级1<br/>（评论数<10）</p></label></td>
		<td><p align="left">等级1称号：<br/><textarea name="pldjch1" type="text" id="pldjch1" style="width:98%;"><?php echo $zbp->Config('zbpNana')->pldjch1;?></textarea><br/></p></td>
		<td><p align="left">比如：农民</p></td>
	</tr>
		<tr>
		<td><label for="pldjch2"><p align="center">评论者等级2<br/>（评论数>=10）</p></label></td>
		<td><p align="left">等级2称号：<br/><textarea name="pldjch2" type="text" id="pldjch2" style="width:98%;"><?php echo $zbp->Config('zbpNana')->pldjch2;?></textarea><br/></p></td>
		<td><p align="left">比如：队长</p></td>
	</tr>
		<tr>
		<td><label for="pldjch3"><p align="center">评论者等级3<br/>（评论数>=20）</p></label></td>
		<td><p align="left">等级3称号：<br/><textarea name="pldjch3" type="text" id="pldjch3" style="width:98%;"><?php echo $zbp->Config('zbpNana')->pldjch3;?></textarea><br/></p></td>
		<td><p align="left">比如：村长</p></td>
	</tr>
		<tr>
		<td><label for="pldjch4"><p align="center">评论者等级4<br/>（评论数>=40）</p></label></td>
		<td><p align="left">等级4称号：<br/><textarea name="pldjch4" type="text" id="pldjch4" style="width:98%;"><?php echo $zbp->Config('zbpNana')->pldjch4;?></textarea><br/></p></td>
		<td><p align="left">比如：乡长</p></td>
	</tr>
		<tr>
		<td><label for="pldjch5"><p align="center">评论者等级5<br/>（评论数>=80）</p></label></td>
		<td><p align="left">等级5称号：<br/><textarea name="pldjch5" type="text" id="pldjch5" style="width:98%;"><?php echo $zbp->Config('zbpNana')->pldjch5;?></textarea><br/></p></td>
		<td><p align="left">比如：县长</p></td>
	</tr>
		<tr>
		<td><label for="pldjch6"><p align="center">评论者等级6<br/>（评论数>=160）</p></label></td>
		<td><p align="left">等级6称号：<br/><textarea name="pldjch6" type="text" id="pldjch6" style="width:98%;"><?php echo $zbp->Config('zbpNana')->pldjch6;?></textarea><br/></p></td>
		<td><p align="left">比如：市长</p></td>
	</tr>
		<tr>
		<td><label for="pldjch7"><p align="center">评论者等级7<br/>（评论数>=320）</p></label></td>
		<td><p align="left">等级7称号：<br/><textarea name="pldjch7" type="text" id="pldjch7" style="width:98%;"><?php echo $zbp->Config('zbpNana')->pldjch7;?></textarea><br/></p></td>
		<td><p align="left">比如：省长</p></td>
	</tr>
		<tr>
		<td><label for="pldjch8"><p align="center">评论者等级8<br/>（评论数>=640）</p></label></td>
		<td><p align="left">等级8称号：<br/><textarea name="pldjch8" type="text" id="pldjch8" style="width:98%;"><?php echo $zbp->Config('zbpNana')->pldjch8;?></textarea><br/></p></td>
		<td><p align="left">比如：总理</p></td>
	</tr>
		<tr>
		<td><label for="pldjch9"><p align="center">评论者等级9<br/>（评论数>=1280）</p></label></td>
		<td><p align="left">等级9称号：<br/><textarea name="pldjch9" type="text" id="pldjch9" style="width:98%;"><?php echo $zbp->Config('zbpNana')->pldjch9;?></textarea><br/></p></td>
		<td><p align="left">比如：主席</p></td>
	</tr>	
</table>
	<br />
	<input name="" type="Submit" class="button" value="保存"/>
		</form>
<?php } if ($act == 'slide') {?>
	<form id="form7" name="form7" method="post">	
	<table width="100%" style='padding:0;margin:0;' cellspacing='0' cellpadding='0' class="tableBorder">
	<tr>
		<th width="15%"><p align="center">幻灯片</p></th>
		<th width="46%"><p align="left"><textarea name="hdpsz_dm" type="text" id="hdpsz_dm" rows="8" style="width:98%;"><?php echo $zbp->Config('zbpNana')->hdpsz_dm;?></textarea></p></th>
		<th width="10%"><p align="center"><input type="text" id="hdpsz_kg" name="hdpsz_kg" class="checkbox" value="<?php echo $zbp->Config('zbpNana')->hdpsz_kg;?>" /></p></th>
		<th width="25%"><p align="left">请替换li里面的链接地址、图片地址、标题，一个li就是一个幻灯片。幻灯片建议大小一致，宽800</p></th>
	</tr>	
</table>
	<br />
	<input name="" type="Submit" class="button" value="保存"/>
		</form>
<?php }?>
		
	</div>
</div>
<!--#include file="..\..\..\..\zb_system\admin\admin_footer.asp"-->
<script type="text/javascript">
ActiveTopMenu("topmenu_zbpNana");
AddHeaderIcon("<?php echo $zbp->host?>zb_system/image/common/themes_32.png");
$('#bgpicker').colpick({
	layout:'hex',
	submit:0,
	onChange:function(hsb,hex,rgb,el,bySetColor) {
		$(el).css('border-color','#'+hex);
		if(!bySetColor) $(el).val(hex);
	}
}).keyup(function(){
	$(this).colpickSetColor(this.value);
});

$('.color-box').click(function() {
	    var c = $(this).data('color');
		$('#bgpicker').colpickSetColor(c);
		$('#bgpicker').val(c );
		$('#bgpicker').css('border-color', '#'+c); 
});
</script> 

<?php
require $blogpath . 'zb_system/admin/admin_footer.php';
RunTime();
?>