<?php
require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';

$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {$zbp->ShowError(6);die();}
if (!$zbp->CheckPlugin('Blogs')) {$zbp->ShowError(48);die();}
$blogtitle = 'Blogs主题配置';

$act = "";
if ($_GET['act']){
$act = $_GET['act'] == "" ? 'ztsm' : $_GET['act'];
}

require $blogpath . 'zb_system/admin/admin_header.php';
require $blogpath . 'zb_system/admin/admin_top.php';

$percolors = array("C01E22", "0088cc", "FF5E52", "2CDB87", "00D6AC", "EA84FF", "FDAC5F", "FD77B2", "0DAAEA", "C38CFF", "FF926F", "8AC78F", "C7C183");

if(isset($_POST['wenzhanglbytpbj'])){
	$zbp->Config('Blogs')->custom_bgcolor = GetVars('bgcolor', 'POST');
	$zbp->Config('Blogs')->cebianlanbj = $_POST['cebianlanbj'];
	$zbp->Config('Blogs')->wenzhanglbytpbj = $_POST['wenzhanglbytpbj'];
	$zbp->Config('Blogs')->fanyeanniu = $_POST['fanyeanniu'];
	$zbp->Config('Blogs')->lianjiefu = $_POST['lianjiefu'];
	$zbp->Config('Blogs')->Keywords = $_POST['Keywords'];
	$zbp->Config('Blogs')->Description = $_POST['Description'];
$zbp->Config('Blogs')->cblbiaoqian = $_POST['cblbiaoqian'];	
$zbp->Config('Blogs')->cblzhwz_day = $_POST['cblzhwz_day'];
$zbp->Config('Blogs')->zzbgzh_kg = $_POST['zzbgzh_kg'];
$zbp->Config('Blogs')->gonggaolan = $_POST['gonggaolan'];
$zbp->Config('Blogs')->youshangjue = $_POST['youshangjue'];
$zbp->Config('Blogs')->zuoshangjue = $_POST['zuoshangjue'];
$zbp->Config('Blogs')->liuyanban = $_POST['liuyanban'];
$zbp->Config('Blogs')->chongfudianzan = $_POST['chongfudianzan'];
$zbp->Config('Blogs')->banquanxinxi = $_POST['banquanxinxi'];
$zbp->Config('Blogs')->yejiaoanniu1 = $_POST['yejiaoanniu1'];
$zbp->Config('Blogs')->yejiaoanniu2 = $_POST['yejiaoanniu2'];
$zbp->Config('Blogs')->yejiaoxiangguan = $_POST['yejiaoxiangguan'];
$zbp->Config('Blogs')->baidutongji = $_POST['baidutongji'];
$zbp->Config('Blogs')->yejiaoewdm = $_POST['yejiaoewdm'];
$zbp->Config('Blogs')->slsljan = $_POST['slsljan'];
$zbp->Config('Blogs')->zhutiseo_kg = $_POST['zhutiseo_kg'];
$zbp->Config('Blogs')->wzlx_kg = $_POST['wzlx_kg'];
$zbp->Config('Blogs')->zxys_kg = $_POST['zxys_kg'];
$zbp->Config('Blogs')->wzfx_kg = $_POST['wzfx_kg'];
$zbp->Config('Blogs')->wzds_kg = $_POST['wzds_kg'];
$zbp->Config('Blogs')->wzdz_kg = $_POST['wzdz_kg'];
	$zbp->SaveConfig('Blogs');
	$zbp->ShowHint('good');
}

if(isset($_POST['hdpsz_kg'])){
	$zbp->Config('Blogs')->hdpsz_dm = $_POST['hdpsz_dm'];
	$zbp->Config('Blogs')->hdpsz_kg = $_POST['hdpsz_kg'];
	$zbp->SaveConfig('Blogs');
	$zbp->ShowHint('good');
}

if(isset($_POST['DisplayAd1']) || isset($_POST['DisplayAd4']) || isset($_POST['DisplayAd5']) || isset($_POST['DisplayAd6'])){
$zbp->Config('Blogs')->Ad1 = $_POST['Ad1'];
$zbp->Config('Blogs')->Ad4 = $_POST['Ad4'];
$zbp->Config('Blogs')->Ad5 = $_POST['Ad5'];
$zbp->Config('Blogs')->Ad6 = $_POST['Ad6'];
$zbp->Config('Blogs')->Adm1 = $_POST['Adm1'];
$zbp->Config('Blogs')->Adm4 = $_POST['Adm4'];
$zbp->Config('Blogs')->Adm5 = $_POST['Adm5'];
$zbp->Config('Blogs')->Adm6 = $_POST['Adm6'];
$zbp->Config('Blogs')->DisplayAd1 = $_POST['DisplayAd1'];
$zbp->Config('Blogs')->DisplayAd4 = $_POST['DisplayAd4'];
$zbp->Config('Blogs')->DisplayAd5 = $_POST['DisplayAd5'];
$zbp->Config('Blogs')->DisplayAd6 = $_POST['DisplayAd6'];
$zbp->SaveConfig('Blogs');
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
	<?php Blogs_SubMenu($act);?>
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
							<input type="text" id="bgpicker" class="colorpicker" name="bgcolor" value="<?php echo $zbp->Config('Blogs')->custom_bgcolor;?>" style="border-color:#<?php echo $zbp->Config('Blogs')->custom_bgcolor;?>" />
						</div>
					</td>
					<td><p align="left">选择站点颜色风格</p></td>
				</tr>
		<tr>
<th width="33%"><p align="center">是否启用自选颜色<br><input type="text" id="zxys_kg" name="zxys_kg" class="checkbox" value="<?php echo $zbp->Config('Blogs')->zxys_kg;?>"/></p></th>
<th width="33%"><p align="center">是否启用主题SEO功能<br><input type="text" id="zhutiseo_kg" name="zhutiseo_kg" class="checkbox" value="<?php echo $zbp->Config('Blogs')->zhutiseo_kg;?>"/></p></th>
<th width="33%"><p align="center">是否显示文章类型<br><input type="text" id="wzlx_kg" name="wzlx_kg" class="checkbox" value="<?php echo $zbp->Config('Blogs')->wzlx_kg;?>"/></p></th>
</tr>
<tr>
<th width="33%"><p align="center">是否启用文章分享<br><input type="text" id="wzfx_kg" name="wzfx_kg" class="checkbox" value="<?php echo $zbp->Config('Blogs')->wzfx_kg;?>"/></p></th>
<th width="33%"><p align="center">是否启用文章打赏<br><input type="text" id="wzds_kg" name="wzds_kg" class="checkbox" value="<?php echo $zbp->Config('Blogs')->wzds_kg;?>"/></p></th>
<th width="33%"><p align="center">是否启用文章点赞<br><input type="text" id="wzdz_kg" name="wzdz_kg" class="checkbox" value="<?php echo $zbp->Config('Blogs')->wzdz_kg;?>"/></p></th>
</tr>				
				<tr>
					<td><label for="wenzhanglbytpbj"><p align="center">博客布局</p></label></td>					
					<td ><p align="left">
						<label><input type="radio" id="wzlbtpbj1" name="wenzhanglbytpbj" value="1" <?php echo $zbp->Config('Blogs')->wenzhanglbytpbj ==1 ? 'checked="checked"' : '';?>/>居左布局</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="wzlbtpbj2" name="wenzhanglbytpbj" value="2" <?php echo $zbp->Config('Blogs')->wenzhanglbytpbj ==2 ? 'checked="checked"' : '';?>/>居右布局</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="wzlbtpbj2" name="wenzhanglbytpbj" value="3" <?php echo $zbp->Config('Blogs')->wenzhanglbytpbj ==3 ? 'checked="checked"' : '';?>/>居上布局</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="wzlbtpbj2" name="wenzhanglbytpbj" value="4" <?php echo $zbp->Config('Blogs')->wenzhanglbytpbj ==4 ? 'checked="checked"' : '';?>/>居下布局</label>
					</p></td>
					<td><p align="left">选择站点博客、文章列表页图片位置布局，默认居左布局</p></td>
				</tr>				
				<tr>
					<td><label for="cebianlanbj"><p align="center">侧边栏布局</p></label></td>					
					<td ><p align="left">
						<label><input type="radio" id="cblbj1" name="cebianlanbj" value="1" <?php echo $zbp->Config('Blogs')->cebianlanbj ==1 ? 'checked="checked"' : '';?>/>居右布局</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="cblbj2" name="cebianlanbj" value="2" <?php echo $zbp->Config('Blogs')->cebianlanbj ==2 ? 'checked="checked"' : '';?>/>居左布局</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="cblbj3" name="cebianlanbj" value="3" <?php echo $zbp->Config('Blogs')->cebianlanbj ==3 ? 'checked="checked"' : '';?>/>无侧边栏布局</label>
					</p></td>
					<td><p align="left">选择站点侧边布局，默认居右布局</p></td>
				</tr>
				<tr>
					<td><label for="fanyeanniu"><p align="center">列表翻页按钮</p></label></td>					
					<td ><p align="left">
						<label><input type="radio" id="lbfyan1" name="fanyeanniu" value="1" <?php echo $zbp->Config('Blogs')->fanyeanniu ==1 ? 'checked="checked"' : '';?>/>标准按钮</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="lbfyan2" name="fanyeanniu" value="2" <?php echo $zbp->Config('Blogs')->fanyeanniu ==2 ? 'checked="checked"' : '';?>/>人工加载</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="lbfyan3" name="fanyeanniu" value="3" <?php echo $zbp->Config('Blogs')->fanyeanniu ==3 ? 'checked="checked"' : '';?>/>自动加载</label>
					</p></td>
					<td><p align="left">人工和自动加载采用AJAX翻页，默认标准按钮</p></td>
				</tr>
				<tr>
					<td><label for="lianjiefu"><p align="center">链接符 <?php echo $zbp->Config('Blogs')->lianjiefu;?></p></label></td>					
					<td ><p align="left">
						<label><input type="radio" id="ljf1" name="lianjiefu" value="|" <?php echo ($zbp->Config('Blogs')->lianjiefu =='|' ? 'checked="checked"' : '');?>/>竖线"|"</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="ljf2" name="lianjiefu" value="-" <?php echo ($zbp->Config('Blogs')->lianjiefu =='-' ? 'checked="checked"' : '');?>/>中横杠"-"</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="ljf3" name="lianjiefu" value="_" <?php echo ($zbp->Config('Blogs')->lianjiefu =='_' ? 'checked="checked"' : '');?>/>下划线"_"</label>
					</p></td>
					<td><p align="left">选择站点SEO标题链接符</p></td>
				</tr>
			<td><label for="Keywords"><p align="center">站点关键词</p></label></td>
			<td><p align="left"><textarea name="Keywords" type="text" id="Keywords" rows="2" style="width:98%;"><?php echo $zbp->Config('Blogs')->Keywords;?></textarea></p></td>
			<td><p align="left">填写站点关键词，多个英文逗号隔开</p></td>
		</tr>
		<tr>
			 <td><label for="Description"><p align="center">站点描述</p></label></td>
			<td><p align="left"><textarea name="Description" type="text" id="Description" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->Description;?></textarea></p></td>
			<td><p align="left">填写站点描述</p></td>
		</tr>
		<tr>
					<td><label for="cblbiaoqian"><p align="center">侧边栏标签云</p></label></td>					
					<td ><p align="left">
						<label><input type="radio" id="cblbqy1" name="cblbiaoqian" value="1" <?php echo $zbp->Config('Blogs')->cblbiaoqian ==1 ? 'checked="checked"' : '';?>/>默认标签云</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="cblbqy2" name="cblbiaoqian" value="2" <?php echo $zbp->Config('Blogs')->cblbiaoqian ==2 ? 'checked="checked"' : '';?>/>彩色标签云</label>
						&nbsp;&nbsp;
						<label><input type="radio" id="cblbqy3" name="cblbiaoqian" value="3" <?php echo $zbp->Config('Blogs')->cblbiaoqian ==3 ? 'checked="checked"' : '';?>/>3D标签云</label>
					</p></td>
					<td><p align="left">切换不同标签云后需要到模块管理中编辑更新标签列表才行</p></td>
				</tr>
		<tr>
			 <td><label for="xiangguanshezhi"><p align="center">侧边栏综合文章</p></label></td>
			<td><p align="left"><label>是否变更侧边栏作者列表为综合文章：<input type="text" id="zzbgzh_kg" name="zzbgzh_kg" class="checkbox" value="<?php echo $zbp->Config('Blogs')->zzbgzh_kg;?>"/></label><br/>
			<label>热评热门文章统计天数：<input style="width:60px;" type="text" name="cblzhwz_day" value="<?php echo $zbp->Config('Blogs')->cblzhwz_day;?>" /></label>
			</p></td>
			<td><p align="left">侧边栏模块综合文章（站长推荐、热门文章和热评文章）</p></td>
		</tr>
		<tr>
			 <td><label for="gonggaolan"><p align="center">首页公告栏</p></label></td>
			<td><p align="left"><textarea name="gonggaolan" type="text" id="gonggaolan" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->gonggaolan;?></textarea></p></td>
			<td><p align="left">填写首页公告栏滚动内容</p></td>
		</tr>
		<tr>
			 <td><label for="youshangjue"><p align="center">右上角菜单</p></label></td>
			<td><p align="left"><textarea name="youshangjue" type="text" id="youshangjue" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->youshangjue;?></textarea></p></td>
			<td><p align="left">填写站点右上角菜单</p></td>
		</tr>
		<tr>
			 <td><label for="zuoshangjue"><p align="center">欢迎语</p></label></td>
			<td><p align="left"><textarea name="zuoshangjue" type="text" id="zuoshangjue" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->zuoshangjue;?></textarea></p></td>
			<td><p align="left">填写站点左上角欢迎语</p></td>
		</tr>
		<tr>
			 <td><label for="liuyanban"><p align="center">留言板地址</p></label></td>
			<td><p align="left"><textarea name="liuyanban" type="text" id="liuyanban" style="width:98%;"><?php echo $zbp->Config('Blogs')->liuyanban;?></textarea></p></td>
			<td><p align="left">填写留言板地址，非日志页悬浮直达留言板按钮</p></td>
		</tr>
		<tr>
			 <td><label for="chongfudianzan"><p align="center">重复点赞提示</p></label></td>
			<td><p align="left"><textarea name="chongfudianzan" type="text" id="chongfudianzan" style="width:98%;"><?php echo $zbp->Config('Blogs')->chongfudianzan;?></textarea></p></td>
			<td><p align="left">填写日志页重复点赞提示内容</p></td>
		</tr>
		<tr>
			 <td><label for="banquanxinxi"><p align="center">页脚站点信息</p></label></td>
			<td><p align="left"><textarea name="banquanxinxi" type="text" id="banquanxinxi" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->banquanxinxi;?></textarea></p></td>
			<td><p align="left">站点信息不建议太长，建议为站点名称</p></td>
		</tr>
		<tr>
			 <td><label for="yejiaoanniu1"><p align="center">页脚按钮1链接</p></label></td>
			<td><p align="left"><textarea name="yejiaoanniu1" type="text" id="yejiaoanniu1" style="width:98%;"><?php echo $zbp->Config('Blogs')->yejiaoanniu1;?></textarea></p></td>
			<td><p align="left">填写页脚右下角关注我们按钮1链接</p></td>
		</tr>
		<tr>
			 <td><label for="yejiaoanniu2"><p align="center">页脚按钮2链接</p></label></td>
			<td><p align="left"><textarea name="yejiaoanniu2" type="text" id="yejiaoanniu2" style="width:98%;"><?php echo $zbp->Config('Blogs')->yejiaoanniu2;?></textarea></p></td>
			<td><p align="left">填写页脚右下角关注我们按钮2链接</p></td>
		</tr>
		<tr>
			 <td><label for="yejiaoxiangguan"><p align="center">页脚相关链接</p></label></td>
			<td><p align="left"><textarea name="yejiaoxiangguan" type="text" id="yejiaoxiangguan" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->yejiaoxiangguan;?></textarea></p></td>
			<td><p align="left">填写页脚站点相关链接</p></td>
		</tr>
		<tr>
			 <td><label for="baidutongji"><p align="center">页头额外代码</p></label></td>
			<td><p align="left"><textarea name="baidutongji" type="text" id="baidutongji" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->baidutongji;?></textarea></p></td>
			<td><p align="left">在[/head]之前填写的代码，如百度统计代码</p></td>
		</tr>
		<tr>
			 <td><label for="yejiaoewdm"><p align="center">页脚额外代码</p></label></td>
			<td><p align="left"><textarea name="yejiaoewdm" type="text" id="yejiaoewdm" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->yejiaoewdm;?></textarea></p></td>
			<td><p align="left">在[/body]之前填写的代码，如百度、360推送的JS代码</p></td>
		</tr>
	<tr>
			 <td><label for="slsljan"><p align="center">404页面链接按钮</p></label></td>
			<td><p align="left"><textarea name="slsljan" type="text" id="slsljan" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->slsljan;?></textarea></p></td>
			<td><p align="left">在404页面显示的链接按钮</p></td>
		</tr>
	</table>
	<br />
	<input name="" type="Submit" class="button" style="margin-top:10px;padding:0 auto;" value="保存"/>
</form>

<?php } if ($act == 'ztsm'){
	?>
<form id="form4" name="form4" method="post">	
<table name="form1" width="100%" style="padding:0;margin:0;" cellspacing="0" cellpadding="0" class="tableBorder">
	<tr><td>
		<p>1、Blogs主题是根据本人的<a href="https://yigujin.cn/nana/" target="_blank">WP响应式主题Nana</a>和<a href="https://yigujin.cn/zbpnana/" target="_blank">zblogPHP博客、CMS、图片三合一响应式主题zbpNana</a>编译而来，Blogs主题支持一键切换博客布局和侧边栏布局（组合起来共有12种布局），还支持一键切换颜色风格！</p>
		<p>2、Blogs主题发布页和使用说明，请移步到 <a href="https://yigujin.cn/blogs/" target="_blank">主题使用说明</a>查阅</p>
		<p>3、启用主题后模块中的控制面板、搜索、最近发表、最新留言、标签列表、作者列表等模块已经重建过，所以需要直接编辑提交方可生效。</p>
		<p>4、启用主题后，请根据Blogs主题配置相关项目进行设置，每一个选项都配有说明，部分项目也设置有默认内容，请根据内容修改即可。</p>
		<p>5、首页、分类目录页使用默认侧边栏（侧边栏1），文章页、页面使用侧边栏2。</p>
		<p>6、免费主题请保留主题版权及链接，如需去除版权请赞助本主题20元版权费，并可加入懿古今主题交流群（477678587），赞助后请联系本人（QQ：2226524923）邀请加入。</p>
	</td></tr>	
</table>
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
		<td><p align="left">PC端：<br/><textarea name="Ad1" type="text" id="Ad1" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->Ad1;?></textarea><br/>移动端：<br/><textarea name="Adm1" type="text" id="Adm1" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->Adm1;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplayAd1" name="DisplayAd1" class="checkbox" value="<?php echo $zbp->Config('Blogs')->DisplayAd1;?>" /></p></td>
		<td><p align="left">位置：首页导航栏下方广告位，宽1078，高随意</p></td>
	</tr>
		<tr>
		<td><label for="Ad4"><p align="center">文章标题下方广告位</p></label></td>
		<td><p align="left">PC端：<br/><textarea name="Ad4" type="text" id="Ad4" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->Ad4;?></textarea><br/>移动端：<br/><textarea name="Adm4" type="text" id="Adm4" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->Adm4;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplayAd4" name="DisplayAd4" class="checkbox" value="<?php echo $zbp->Config('Blogs')->DisplayAd4;?>" /></p></td>
		<td><p align="left">位置：文章页标题下方，正文上方位置，宽728，高随意</p></td>
	</tr>
	<tr>
		<td><label for="Ad5"><p align="center">相关文章上方广告位</p></label></td>
		<td><p align="left">PC端：<br/><textarea name="Ad5" type="text" id="Ad5" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->Ad5;?></textarea><br/>移动端：<br/><textarea name="Adm5" type="text" id="Adm5" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->Adm5;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplayAd5" name="DisplayAd5" class="checkbox" value="<?php echo $zbp->Config('Blogs')->DisplayAd5;?>" /></p></td>
		<td><p align="left">位置：文章页正文下方，相关文章上方位置，宽778，高随意</p></td>
	</tr>
	<tr>
		<td><label for="Ad6"><p align="center">评论上方广告位</p></label></td>
		<td><p align="left">PC端：<br/><textarea name="Ad6" type="text" id="Ad6" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->Ad6;?></textarea><br/>移动端：<br/><textarea name="Adm6" type="text" id="Adm6" rows="4" style="width:98%;"><?php echo $zbp->Config('Blogs')->Adm6;?></textarea></p></td>
		<td><p align="center"><input type="text" id="DisplayAd6" name="DisplayAd6" class="checkbox" value="<?php echo $zbp->Config('Blogs')->DisplayAd6;?>" /></p></td>
		<td><p align="left">位置：文章页相关文章下方评论上方位置，宽778，高随意</p></td>
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
		<th width="46%"><p align="left"><textarea name="hdpsz_dm" type="text" id="hdpsz_dm" rows="8" style="width:98%;"><?php echo $zbp->Config('Blogs')->hdpsz_dm;?></textarea></p></th>
		<th width="10%"><p align="center"><input type="text" id="hdpsz_kg" name="hdpsz_kg" class="checkbox" value="<?php echo $zbp->Config('Blogs')->hdpsz_kg;?>" /></p></th>
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
ActiveTopMenu("topmenu_Blogs");
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