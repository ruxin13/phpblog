<?php
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugin/prise.php';
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugin/zh_to_py.php';
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugin/zimutouxiang.php';
#注册插件
RegisterPlugin("Blogs", "ActivePlugin_Blogs");

//读者墙
function Blogs_readers_wall(){
	global $zbp;		
	$sql = $zbp->db->sql->Select(
		$zbp->table['Comment'],
		array('COUNT(comm_ID) AS cnt, comm_Name, comm_HomePage , comm_Email'),
		array(
			array('<>', 'comm_Name', '访客'),
			array('=', 'comm_AuthorID', 0),			
			array('CUSTOM', '1=1 GROUP BY comm_Email')
		),
		array('cnt' => 'DESC'),
		100,
	null
	);
	$array=$zbp->db->Query($sql);	
	$r ="\r\n";
	$i = 0;
    foreach ($array as $comment) {
		$i++;
		$c_url = $comment['comm_HomePage'];
		if (!$c_url) {
			$c_url = $zbp->host;
		}

		$tt = $i;

		if ($i == 1) {
			$tt = "读者之青龙";
		}
		else if ($i == 2) {
			$tt = "读者之白虎";
		}
		else if ($i == 3) {
			$tt = "读者之朱雀";
		}
		else if ($i == 4) {
			$tt = "读者之玄武";
		}
		else {
			$tt = "第" . $i . "名";
		}
	
		if ($i < 5) {
			$r .= '<a class="item-top item-"' . $i . '"" target="_blank" href="'. $c_url .'" title="【' . $tt . '】评论：'. $comment['cnt'] . '"><h4>【' . $tt . '】</h4><img src="https://secure.gravatar.com/avatar/"'.md5(strtolower($comment['comm_Email'])).'&amp;r=X&amp;s=36" class="avatar avatar-36 photo" height="36" width="36"><strong>' . $comment['comm_Name'] .'</strong>' . $c_url . '</a>';
		}
		else {
			$r .= '<a target="_blank" href="' . $c_url . '" title="【' . $tt . '】评论：'. $comment['cnt'] . '"><img src="https://secure.gravatar.com/avatar/'.md5(strtolower($comment['comm_Email'])).'&amp;r=X&amp;s=36" class="avatar avatar-36 photo" height="36" width="36">'. $comment['comm_Name'] . '</a>';
		}
   }     
	return $r;
}

//表情替换
function Blogs_biaoqing($content) {
	global $zbp;
	$res = array();   
    $bqcon='';
	$n = preg_match_all("/(?:\[)(face_[0-3][0-9]{0,1})(?:\])/i",$content, $res);  
	if($n == 0 || $n == false){
		$bqcon=$content;
	} else { 
		$bqcon="{$zbp->host}zb_users/theme/{$zbp->theme}/image/smilies/";
		$bqcon=preg_replace("/(?:\[)(face_[0-3][0-9]{0,1})(?:\])/i","<img src='$bqcon\${1}.gif' alt='\${1}' class='wp-smiley'>",$content);
	}
return $bqcon;
}

//缩略图
function Blogs_thumbnail($id,$sltww, $slthh,$link) {
	global $zbp,$article;
	$article=GetPost((int)$id);
	$random = mt_rand(1, 10);
	        preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?\/>/sim', $article->Content, $strResult, PREG_PATTERN_ORDER);
	        $n = count($strResult[1]);
			$zdsuoluetu=$article->Metas->Blogs_suoluetu;
			if(empty($zdsuoluetu)){
				if($n > 0){
					$sltu=$strResult[1][0];
				} else { 
					$sltu="{$zbp->host}zb_users/theme/{$zbp->theme}/image/random/{$random}.jpg";
	        }
			}else{
				$sltu=$zdsuoluetu;
			}
			$sltu="<img src=\"{$zbp->host}zb_users/theme/{$zbp->theme}/template/timthumb.php?src={$sltu}&w={$sltww}&h={$slthh}&zc=1\" alt=\"{$article->Title}\" />";
			if($link==1){
				$sltu="<a href=\"{$article->Url}\"  title=\"{$article->Title}\">{$sltu}</a>";
			}
			return $sltu;
}

//文章作者
function Blogs_wenzhangzuozhe($id) {
	global $zbp,$article;
	$article=GetPost((int)$id);
			$wenzhangzuozhe=$article->Metas->Blogs_zuozhe;
			if(empty($wenzhangzuozhe)){
				$wenzhangzuozhe =$article->Author->StaticName;
	        }
			echo $wenzhangzuozhe;
}
//文章来源
function Blogs_wenzhanglaiyuan($id) {
	global $zbp,$article;
	$article=GetPost((int)$id);
			$wenzhanglaiyuan=$article->Metas->Blogs_laiyuan;
			if(empty($wenzhanglaiyuan)){
				$wenzhanglaiyuan =$article->Author->Url;
	        }
			echo $wenzhanglaiyuan;
}

function Blogs_wenzhangxgfl($aid,$cid,$nums) {
	global $zbp,$strxg;
    $where = array(array('=','log_Status','0'),array('=','log_CateID',$cid),array('not in','log_ID',$aid));
    $array = $zbp->GetArticleList(array('*'),$where,array('log_PostTime'=>'DESC'),array($nums),'');
    foreach ($array as $article) {
        $strxg .= "<li><span class=\"post_spliter\">•</span><a href=\"{$article->Url}\">{$article->Title}</a></li>";
    }
	echo $strxg;
}

function ActivePlugin_Blogs() {
	global $zbp;
	if($zbp->Config('Blogs')->zhutiseo_kg){
	Add_Filter_Plugin('Filter_Plugin_Edit_Response5','Blogs_wenzhangxg');
	Add_Filter_Plugin('Filter_Plugin_Tag_Edit_Response','Blogs_biaoqianseo');
	Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','Blogs_fenleiseo');
	}
	Add_Filter_Plugin('Filter_Plugin_Cmd_Ajax', 'Blogs_prise_do');
	Add_Filter_Plugin('Filter_Plugin_Html_Js_Add', 'Blogs_Html_Js_Add');
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu', 'Blogs_AddMenu');
	$s = '';
	if($zbp->Config('Blogs')->zxys_kg){
		if($zbp->Config('Blogs')->HasKey("custom_bgcolor") && $zbp->Config('Blogs')->custom_bgcolor !== 'C01E22'){
		$zbp->Config('Blogs')->custom_bgcolor = str_replace('#', '', $zbp->Config('Blogs')->custom_bgcolor);
		$s .=   "#searchformc button,#searchform button,.entry-content .cat a,.post-format a,.aside-cat,.page-links span,.page-links a:hover span,.tglx,.widget_categories a:hover,.widget_links a:hover,#sidebar .widget_nav_menu a:hover,#divCommentPost #submit,.comment-tool a:hover,.pagination a:hover,.pagination span.current,.pagination .prev,.pagination .next,#down a,.buttons a,.expand_collapse,#tag_letter li:hover,.foot .p2 li .isquare,.link-all a:hover,.meta-nav:hover,.new_cat li.hov .time,.rslides_tabs .rslides_here a,.fancybox-close,#divCommentPost h3 a:hover,#divAuthors-1 a:hover,#divFavorites-1 a:hover,#divContorPanel-1 .cp-login a:hover,#divContorPanel-1 .cp-vrs a:hover,#divStatistics-1 li:hover,#divArchives-1 a:hover,#divCatalog-1 a:hover{background: #" . $zbp->Config('Blogs')->custom_bgcolor . ";}.widget_categories li:hover,.widget_links li:hover,#sidebar .widget_nav_menu li:hover,#tag_letter li,.readMore a,.post-date-ribbon{background-color:#" . $zbp->Config('Blogs')->custom_bgcolor . ";}a:hover,.top-menu a:hover,.default-menu li a,#user-profile a:hover,#site-nav .down-menu > li > a:hover,#site-nav .down-menu > li.sfHover > a,#site-nav .down-menu > .current-menu-item > a,#site-nav .down-menu > .current-menu-item > a:hover,.scrolltext-title a,.cat-list,.archive-tag a:hover,.entry-meta a,.single-content a,.single-content a:visited,.single-content a:hover,.showmore span,.post_cat a,.single_info .comment a,.single_banquan a,.single_info_w a,.floor,.at,.at a,#dzq .readers-list a:hover em,#dzq .readers-list a:hover strong,#all_tags li a:hover,.showmore span,.new_cat li.hov .title,a.top_post_item:hover p,#related-medias .media-list .media-inner .media-name,#site-nav ul li.current-menu-parent>a,.readers a.item-top h4,.readers a.item-top strong,#primarys .cat-lists .item-st:hover h3 a,#post_list_box .archive-list:hover h2 a,.line-one .cat-dt:hover h2 a,.line-one .cat-lists .item-st:hover h3 a{color: #" . $zbp->Config('Blogs')->custom_bgcolor . ";}.page-links span,.page-links a:hover span,#divCommentPost #submit,.comment-tool a:hover,.pagination a:hover,.pagination span.current,#down a,.buttons a,.expand_collapse,.link-all a:hover,.meta-nav:hover,.rslides_tabs .rslides_here a,#divCommentPost h3 a:hover,#divAuthors-1 a:hover,#divFavorites-1 a:hover,#divContorPanel-1 .cp-login a:hover,#divContorPanel-1 .cp-vrs a:hover,#divStatistics-1 li:hover,#divArchives-1 a:hover,#divCatalog-1 a:hover{border: 1px solid #" . $zbp->Config('Blogs')->custom_bgcolor . ";}#dzq .readers-list a:hover{border-color: #" . $zbp->Config('Blogs')->custom_bgcolor . ";}.sf-arrows>li>.sf-with-ul:focus:after,.sf-arrows>li:hover>.sf-with-ul:after,.sf-arrows>.sfHover>.sf-with-ul:after,.sf-arrows>li>.sf-with-ul:focus:after,.sf-arrows>li:hover>.sf-with-ul:after,.sf-arrows>.sfHover>.sf-with-ul:after{border-top-color: #" . $zbp->Config('Blogs')->custom_bgcolor . ";}.sf-arrows ul li>.sf-with-ul:focus:after,.sf-arrows ul li:hover>.sf-with-ul:after,.sf-arrows ul .sfHover>.sf-with-ul:after{border-left-color: #" . $zbp->Config('Blogs')->custom_bgcolor . ";}.cat-box .cat-title a,.cat-box .cat-title .syfl,.widget-title .cat,#top_post_filter li:hover,#top_post_filter .top_post_filter_active{border-bottom: 3px solid #" . $zbp->Config('Blogs')->custom_bgcolor . ";}.entry-content .cat a{border-left: 3px solid #" . $zbp->Config('Blogs')->custom_bgcolor . ";}.single-content h2,.archives-yearmonth{border-left: 5px solid #" . $zbp->Config('Blogs')->custom_bgcolor . ";}.aside-cat{background: none repeat scroll 0 0 #" . $zbp->Config('Blogs')->custom_bgcolor . ";}.new_cat li.hov{border-bottom: dotted 1px #" . $zbp->Config('Blogs')->custom_bgcolor . ";}#site-nav .current-menu-item,#site-nav .down-menu>.current-menu-item>a:hover,#site-nav .down-menu>li.sfHover>a,#site-nav .down-menu>li>a:hover{color:#" . $zbp->Config('Blogs')->custom_bgcolor . "!important}.corner {border-color: transparent transparent #" . $zbp->Config('Blogs')->custom_bgcolor . " transparent;}";
		}
	}

	if ($zbp->Config('Blogs')->wenzhanglbytpbj == '2') {
		$s .= ".archive-list .thumbnail {float: right;margin: 0 0 0 20px;}#post_list_box .entry-meta {left:15px;}.readMore {display:none;}";
	}
	if (($zbp->Config('Blogs')->cebianlanbj == '3' && $zbp->Config('Blogs')->wenzhanglbytpbj == '3') || ($zbp->Config('Blogs')->cebianlanbj == '3' && $zbp->Config('Blogs')->wenzhanglbytpbj == '4')) {
		$s .= ".archive-list{width: 49%;float:left;}.shuangshu{margin-right:2%;}.archive-list .thumbnail {height:100%;}.archive-content {height: 105px;}";
	}
	if ($zbp->Config('Blogs')->wenzhanglbytpbj == '3' || $zbp->Config('Blogs')->wenzhanglbytpbj == '4') {
		$s .= ".archive-list .thumbnail {float:none;margin: 0;width: 100%;}#post_list_box .entry-meta {left:15px;}@media screen and (max-width:768px){.archive-list{width: 100%;float:none;}.shuangshu{margin-right:0%;}.archive-list .entry-header h2 {height:auto;}.archive-list .entry-content {margin-top: 15px;}}@media screen and (max-width:568px){.archive-list .archive-content{line-height: 20px;}}";
	}
	if ($zbp->Config('Blogs')->cebianlanbj == '2') {
		$s .= "#primary{float: right;}#sidebar{float: left;}";
	}
	if ($zbp->Config('Blogs')->cebianlanbj == '3') {
		$s .= "#primary{width: 100%;}";
	}
	$zbp->header .= '	<style type="text/css">'.$s.'</style>' . "\r\n";
}
function Blogs_is_mobile() {
	if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
		$is_mobile = false;
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
			$is_mobile = true;
	} else {
		$is_mobile = false;
	}

	return $is_mobile;
}

function Blogs_AddMenu(&$m){
	global $zbp;
	array_unshift($m, MakeTopMenu("root",'Blogs主题配置',$zbp->host . "zb_users/theme/Blogs/main.php?act=ztsm","","topmenu_Blogs"));
}
function Blogs_SubMenu($id){
	$arySubMenu = array(
		0 => array('主题说明', 'ztsm', 'left', false),
		1 => array('图片设置', 'tpsz', 'left', false),
		2 => array('基本设置', 'jbsz', 'left', false),
		3 => array('幻灯片设置', 'slide', 'left', false),
		4 => array('广告设置', 'absz', 'left', false),
	);
	foreach($arySubMenu as $k => $v){
		echo '<a href="?act='.$v[1].'" '.($v[3]==true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id==$v[1]?'m-now':'').'">'.$v[0].'</span></a>';
	}
}

function Blogs_wenzhangxg(){
    global $zbp,$article;
	if ($_GET['act'] == 'PageEdt'){
		echo '<div class="editmod"><label for="meta_Blogs_pstitle" class="editinputname">SEO标题</label><br/><input type="text" name="meta_Blogs_pstitle" value="'.htmlspecialchars($article->Metas->Blogs_pstitle).'" style="width:50%;"/><br/></div><div class="editmod"><label for="meta_Blogs_psguanjianci" class="editinputname">SEO关键词</label><br/><input type="text" name="meta_Blogs_psguanjianci" value="'.htmlspecialchars($article->Metas->Blogs_psguanjianci).'" style="width:50%;"/></div><div class="editmod"><label for="meta_Blogs_psmiaoshu" class="editinputname">SEO描述</label><br/><textarea name="meta_Blogs_psmiaoshu" type="text" rows="6" cols="50">'.htmlspecialchars($article->Metas->Blogs_psmiaoshu).'</textarea></div>';
	}else{
   	echo '<div class="editmod"><label for="meta_Blogs_suoluetu" class="editinputname">指定缩略图地址</label><input type="text" name="meta_Blogs_suoluetu" value="'.htmlspecialchars($article->Metas->Blogs_suoluetu).'" style="width:50%;"/><br/>*输入指定图片地址作为缩略图，权重：指定缩略图>文章第一张图片>随机图片。</div><div class="editmod"><label class="editinputname">文章类型&nbsp;&nbsp;</label><label><input type="radio" id="wzlx_yc" name="meta_Blogs_wzlx" value="1" '.($article->Metas->Blogs_wzlx ==2?'':$article->Metas->Blogs_wzlx ==3?'':'checked="checked"').' />原创文章(默认)</label>&nbsp;&nbsp;<label><input type="radio" id="wzlx_zz" name="meta_Blogs_wzlx" value="2" '.($article->Metas->Blogs_wzlx ==2?'checked="checked"':'').'/>转载文章</label>&nbsp;&nbsp;<label><input type="radio" id="wzlx_tg" name="meta_Blogs_wzlx" value="3" '.($article->Metas->Blogs_wzlx ==3?'checked="checked"':'').'/>投稿文章</label></div><div class="editmod"><label for="meta_Blogs_zuozhe" class="editinputname">文章作者</label><input type="text" name="meta_Blogs_zuozhe" value="'.htmlspecialchars($article->Metas->Blogs_zuozhe).'" style="width:50%;"/><br/>*转载或投稿文章的作者。</div><div class="editmod"><label for="meta_Blogs_laiyuan" class="editinputname">文章来源</label><input type="text" name="meta_Blogs_laiyuan" value="'.htmlspecialchars($article->Metas->Blogs_laiyuan).'" style="width:50%;"/><br/>*转载或投稿文章的来源地址。</div><p><span class="title">是否添加到站长推荐:</span><br><input type="text" id="meta_Blogs_zhanzhang" name="meta_Blogs_zhanzhang" class="checkbox" value="'.htmlspecialchars($article->Metas->Blogs_zhanzhang).'"/></p>';
	}
}

//插入js变量
function Blogs_Html_Js_Add(){
	global $zbp;
	$Blogszanalert=$zbp->Config('Blogs')->chongfudianzan;
	echo "\r\n".'var $Blogszanalert="'.htmlspecialchars($Blogszanalert).'"'."\r\n";
}

function Blogs_fenleiseo(){
	global $zbp,$cate;
   	echo '<p><span class="title">SEO标题:</span><br><input id="meta_Blogs_fltitle" class="edit" size="40" name="meta_Blogs_fltitle" type="text" value="'.htmlspecialchars($cate->Metas->Blogs_fltitle).'"><br/>*显示该分类的SEO标题。</p><p><span class="title">关键词:</span><br><input id="meta_Blogs_flgjc" class="edit" size="40" name="meta_Blogs_flgjc" type="text" value="'.htmlspecialchars($cate->Metas->Blogs_flgjc).'"><br/>*多个关键词请以英文逗号（,）隔开。</p>';
}


function Blogs_biaoqianseo(){
	global $zbp,$tag;
   	echo '<p><span class="title">SEO标题:</span><br><input id="meta_Blogs_bqtitle" class="edit" size="40" name="meta_Blogs_bqtitle" type="text" value="'.htmlspecialchars($tag->Metas->Blogs_bqtitle).'"><br/>*显示该标签的SEO标题。</p><p><span class="title">关键词:</span><br><input id="meta_Blogs_bqgjc" class="edit" size="40" name="meta_Blogs_bqgjc" type="text" value="'.htmlspecialchars($tag->Metas->Blogs_bqgjc).'"><br/>*多个关键词请以英文逗号（,）隔开。</p>';
}

//选择替换图片
define( 'Blogs_THIS','Blogs');
define( 'Blogs_ROOT_DIR',plugin_dir_path(Blogs_THIS));
define( 'Blogs_ROOT_URL',plugin_dir_url(Blogs_THIS));
function Blogs_Get_Logo($name='logo',$type='png'){
  $path = Blogs_ROOT_DIR.'Blogs/image/'.$name.'.'.$type;
  if (file_exists($path)){
        echo Blogs_ROOT_URL.'Blogs/image/'.$name.'.'.$type;
    }else{
        echo Blogs_ROOT_URL.'Blogs/image/'.$name.'1.'.$type;
    }
}


function Blogs_CreateTable(){
    global $zbp;
	if ($zbp->db->ExistTable($GLOBALS['blog_plugin_Blogs_prise_Table']) == false) {
		$s = $zbp->db->sql->CreateTable($GLOBALS['blog_plugin_Blogs_prise_Table'], $GLOBALS['blog_plugin_Blogs_prise_DataInfo']);
		$zbp->db->QueryMulit($s);
	}
}
function InstallPlugin_Blogs() {
	global $zbp;
	Blogs_CreateTable();
	if(!$zbp->Config('Blogs')->HasKey('Version')){
		$zbp->Config('Blogs')->Version = '1.0';
		$zbp->Config('Blogs')->cebianlanbj = '1';
		$zbp->Config('Blogs')->cblbiaoqian = '1';
		$zbp->Config('Blogs')->wenzhanglbytpbj = '1';
		$zbp->Config('Blogs')->fanyeanniu = '1';
        $zbp->Config('Blogs')->lianjiefu = '-';
		$zbp->Config('Blogs')->Keywords = '请填写站点关键词，多个请用英文逗号隔开';
        $zbp->Config('Blogs')->Description = '请填写站点描述';
		$zbp->Config('Blogs')->xgwz_num = '8';
$zbp->Config('Blogs')->gonggaolan = '<li class="scrolltext-title"><a href="https://www.yigujin.cn/blogs/" rel="bookmark" target="_blank">zblogPHP响应式主题Blogs免费发布啦</a></li><li class="scrolltext-title"><a href="https://www.yigujin.cn/zbpnana/" rel="bookmark" target="_blank">zblogPHP响应式主题zbpNana发布啦</a></li>';
$zbp->Config('Blogs')->youshangjue = '<li><a href="https://www.yigujin.cn/2017lyb/">在线留言</a></li><li><a href="https://www.yigujin.cn/blogs/">Blogs主题</a></li>';
$zbp->Config('Blogs')->zuoshangjue = '您好，欢迎访问光临本站&nbsp;&nbsp;|&nbsp;<a href="填写后台登录地址" target="_blank">登录</a>';
$zbp->Config('Blogs')->chongfudianzan = '你已经点过一次了，可以了，谢谢！！！';
$zbp->Config('Blogs')->banquanxinxi = 'Copyright ©&nbsp; Blogs主题 &nbsp; | &nbsp;  <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">暂无备案</a>';
$zbp->Config('Blogs')->yejiaoanniu1 = '<a href="http://user.qzone.qq.com/123456789" target="_blank">我的QQ空间</a>';
$zbp->Config('Blogs')->yejiaoanniu2 = '<a href="http://weibo.com/weibo" target="_blank">我的新浪微博</a>';
$zbp->Config('Blogs')->yejiaoxiangguan = '<li><span class="post_spliter">•</span><a href="https://www.yigujin.cn/blogs/" target="_blank" rel="nofollow">Blogs主题</a></li><li><span class="post_spliter">•</span><a href="https://www.yigujin.cn/nana/" target="_blank" rel="nofollow">Nana主题</a></li><li><span class="post_spliter">•</span><a href="https://www.yigujin.cn/zbpnana/" target="_blank" rel="nofollow">zbpNana主题</a></li><li><span class="post_spliter">•</span><a href="https://www.yigujin.cn/722.html" target="_blank">主题赞助</a></li><li><span class="post_spliter">•</span><a href="https://www.yigujin.cn/unite/" target="_blank">Unite主题</a></li><li><span class="post_spliter">•</span><a href="https://www.yigujin.cn/three/" target="_blank">Three主题</a></li><li><span class="post_spliter">•</span><a href="https://www.yigujin.cn/673.html" target="_blank">NewUnite主题</a></li><li><span class="post_spliter">•</span><a href="http://boke112.com/" target="_blank">博客导航</a></li>';
$zbp->Config('Blogs')->hdpsz_dm = '<li><a target="_blank" href="https://www.yigujin.cn/blogs"><img src="zb_users/theme/Blogs/image/hdp/170626_Blogs.jpg" alt="zblogPHP清新响应式博客主题Blogs" ></a><p class="slider-caption">zblogPHP清新响应式博客主题Blogs</p></li><li><a target="_blank" href="https://www.yigujin.cn/zbpnana"><img src="zb_users/theme/Blogs/image/hdp/170425_zbpNana.jpg" alt="zblogPHP清新响应式主题zbpNana" ></a><p class="slider-caption">zblogPHP清新响应式主题zbpNana</p></li>';
$zbp->Config('Blogs')->slsljan = '<li><a href="">返回首页</a></li><li><a href="填写留言板地址">留言反馈</a></li><li><a href="填写联系站长URL">联系站长</a></li>';
		$zbp->SaveConfig('Blogs');
}
$zbp->SaveConfig('Blogs');	
}

function UninstallPlugin_Blogs() {
	global $zbp;
}
