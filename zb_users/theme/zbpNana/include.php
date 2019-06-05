<?php
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugin/prise.php';
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugin/zh_to_py.php';
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'plugin/zimutouxiang.php';
#注册插件
RegisterPlugin("zbpNana", "ActivePlugin_zbpNana");

//时间格式多久以前
function zbpNana_timeago($ptime) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if ($etime < 1) return '刚刚';
    $interval = array(
        12 * 30 * 24 * 60 * 60 => '年前 (' . date('Y-m-d', $ptime) . ')',
        30 * 24 * 60 * 60 => '个月前 (' . date('m-d', $ptime) . ')',
        7 * 24 * 60 * 60 => '周前 (' . date('m-d', $ptime) . ')',
        24 * 60 * 60 => '天前',
        60 * 60 => '小时前',
        60 => '分钟前',
        1 => '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}
//读者墙
function zbpNana_readers_wall(){
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
function zbpNana_biaoqing($content) {
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
function zbpNana_thumbnail($id,$sltww, $slthh,$link) {
	global $zbp,$article;
	$article=GetPost((int)$id);
	$random = mt_rand(1, 10);
	        preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?\/>/sim', $article->Content, $strResult, PREG_PATTERN_ORDER);
	        $n = count($strResult[1]);
			$zdsuoluetu=$article->Metas->zbpNana_suoluetu;
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
//文章图片数量
function zbpNana_get_post_images_number($id){
	global $zbp,$article;
	$article=GetPost((int)$id);
		preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $article->Content, $result, PREG_PATTERN_ORDER);
		return count($result[1]);
	}
//文章作者
function zbpNana_wenzhangzuozhe($id) {
	global $zbp,$article;
	$article=GetPost((int)$id);
			$wenzhangzuozhe=$article->Metas->zbpNana_zuozhe;
			if(empty($wenzhangzuozhe)){
				$wenzhangzuozhe =$article->Author->StaticName;
	        }
			echo $wenzhangzuozhe;
}
//文章来源
function zbpNana_wenzhanglaiyuan($id) {
	global $zbp,$article;
	$article=GetPost((int)$id);
			$wenzhanglaiyuan=$article->Metas->zbpNana_laiyuan;
			if(empty($wenzhanglaiyuan)){
				$wenzhanglaiyuan =$article->Author->Url;
	        }
			echo $wenzhanglaiyuan;
}

function zbpNana_wenzhangxgfl($aid,$cid,$nums) {
	global $zbp,$strxg;
    $where = array(array('=','log_Status','0'),array('=','log_CateID',$cid),array('not in','log_ID',$aid));
    $array = $zbp->GetArticleList(array('*'),$where,array('log_PostTime'=>'DESC'),array($nums),'');
    foreach ($array as $article) {
        $strxg .= "<li><span class=\"post_spliter\">•</span><a href=\"{$article->Url}\">{$article->Title}</a></li>";
    }
	echo $strxg;
}

function ActivePlugin_zbpNana() {
	global $zbp;
	if($zbp->Config('zbpNana')->zhutiseo_kg){
	Add_Filter_Plugin('Filter_Plugin_Edit_Response5','zbpNana_wenzhangxg');
	Add_Filter_Plugin('Filter_Plugin_Tag_Edit_Response','zbpNana_biaoqianseo');
	Add_Filter_Plugin('Filter_Plugin_Category_Edit_Response','zbpNana_fenleiseo');
	}
	Add_Filter_Plugin('Filter_Plugin_Cmd_Ajax', 'zbpNana_prise_do');
	Add_Filter_Plugin('Filter_Plugin_Html_Js_Add', 'zbpNana_Html_Js_Add');
	Add_Filter_Plugin('Filter_Plugin_Admin_TopMenu', 'zbpNana_AddMenu');
	if ($zbp->Config('zbpNana')->tupianalt=='1'){
	Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','zbpNana_tupian_alt');
	}
	if ($zbp->Config('zbpNana')->tupianalt=='2'){
	Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','zbpNana_tupian_altqz');
	}
	if ($zbp->Config('zbpNana')->wlzdnf_kg || $zbp->Config('zbpNana')->wzwlgoto_kg){
	Add_Filter_Plugin('Filter_Plugin_ViewPost_Template','zbpNana_links_nofollow');
	}
	$s = '';
	if($zbp->Config('zbpNana')->zxys_kg){
		if($zbp->Config('zbpNana')->HasKey("custom_bgcolor") && $zbp->Config('zbpNana')->custom_bgcolor !== 'C01E22'){
		$zbp->Config('zbpNana')->custom_bgcolor = str_replace('#', '', $zbp->Config('zbpNana')->custom_bgcolor);
		$s .=   "#searchformc button,#searchform button,.entry-content .cat a,.post-format a,.aside-cat,.page-links span,.page-links a:hover span,.tglx,.widget_categories a:hover,.widget_links a:hover,#sidebar .widget_nav_menu a:hover,#divCommentPost #submit,.comment-tool a:hover,.pagination a:hover,.pagination span.current,.pagination .prev,.pagination .next,#down a,.buttons a,.expand_collapse,#tag_letter li:hover,.foot .p2 li .isquare,.link-all a:hover,.meta-nav:hover,.new_cat li.hov .time,.rslides_tabs .rslides_here a,.fancybox-close,#divCommentPost h3 a:hover,#divAuthors-1 a:hover,#divFavorites-1 a:hover,#divContorPanel-1 .cp-login a:hover,#divContorPanel-1 .cp-vrs a:hover,#divStatistics-1 li:hover,#divArchives-1 a:hover,#divCatalog-1 a:hover{background: #" . $zbp->Config('zbpNana')->custom_bgcolor . ";}.widget_categories li:hover,.widget_links li:hover,#sidebar .widget_nav_menu li:hover,#tag_letter li,#tbCalendar td a{background-color:#" . $zbp->Config('zbpNana')->custom_bgcolor . ";}a:hover,.top-menu a:hover,.default-menu li a,#user-profile a:hover,#site-nav .down-menu > li > a:hover,#site-nav .down-menu > li.sfHover > a,#site-nav .down-menu > .current-menu-item > a,#site-nav .down-menu > .current-menu-item > a:hover,.scrolltext-title a,.cat-list,.archive-tag a:hover,.entry-meta a,.single-content a,.single-content a:visited,.single-content a:hover,.showmore span,.post_cat a,.single_info .comment a,.single_banquan a,.single_info_w a,.floor,.at,.at a,#dzq .readers-list a:hover em,#dzq .readers-list a:hover strong,#all_tags li a:hover,.showmore span,.new_cat li.hov .title,a.top_post_item:hover p,#related-medias .media-list .media-inner .media-name,#site-nav ul li.current-menu-parent>a,.readers a.item-top h4,.readers a.item-top strong,#primarys .cat-lists .item-st:hover h3 a,#post_list_box .archive-list:hover h2 a,.line-one .cat-dt:hover h2 a,.line-one .cat-lists .item-st:hover h3 a{color: #" . $zbp->Config('zbpNana')->custom_bgcolor . ";}.page-links span,.page-links a:hover span,#divCommentPost #submit,.comment-tool a:hover,.pagination a:hover,.pagination span.current,#down a,.buttons a,.expand_collapse,.link-all a:hover,.meta-nav:hover,.rslides_tabs .rslides_here a,#divCommentPost h3 a:hover,#divAuthors-1 a:hover,#divFavorites-1 a:hover,#divContorPanel-1 .cp-login a:hover,#divContorPanel-1 .cp-vrs a:hover,#divStatistics-1 li:hover,#divArchives-1 a:hover,#divCatalog-1 a:hover{border: 1px solid #" . $zbp->Config('zbpNana')->custom_bgcolor . ";}#dzq .readers-list a:hover{border-color: #" . $zbp->Config('zbpNana')->custom_bgcolor . ";}.sf-arrows>li>.sf-with-ul:focus:after,.sf-arrows>li:hover>.sf-with-ul:after,.sf-arrows>.sfHover>.sf-with-ul:after,.sf-arrows>li>.sf-with-ul:focus:after,.sf-arrows>li:hover>.sf-with-ul:after,.sf-arrows>.sfHover>.sf-with-ul:after{border-top-color: #" . $zbp->Config('zbpNana')->custom_bgcolor . ";}.sf-arrows ul li>.sf-with-ul:focus:after,.sf-arrows ul li:hover>.sf-with-ul:after,.sf-arrows ul .sfHover>.sf-with-ul:after{border-left-color: #" . $zbp->Config('zbpNana')->custom_bgcolor . ";}.cat-box .cat-title a,.cat-box .cat-title .syfl,.widget-title .cat,#top_post_filter li:hover,#top_post_filter .top_post_filter_active{border-bottom: 3px solid #" . $zbp->Config('zbpNana')->custom_bgcolor . ";}.entry-content .cat a{border-left: 3px solid #" . $zbp->Config('zbpNana')->custom_bgcolor . ";}.single-content h2,.archives-yearmonth{border-left: 5px solid #" . $zbp->Config('zbpNana')->custom_bgcolor . ";}.aside-cat{background: none repeat scroll 0 0 #" . $zbp->Config('zbpNana')->custom_bgcolor . ";}.new_cat li.hov{border-bottom: dotted 1px #" . $zbp->Config('zbpNana')->custom_bgcolor . ";}#site-nav .current-menu-item,#site-nav .down-menu>.current-menu-item>a:hover,#site-nav .down-menu>li.sfHover>a,#site-nav .down-menu>li>a:hover{color:#" . $zbp->Config('zbpNana')->custom_bgcolor . "!important}";
		}
	}
    if ($zbp->Config('zbpNana')->cebianlanbj == '2') {
		$s .= "#primary{float: right;}#sidebar{float: left;}";
	}
	if ($zbp->Config('zbpNana')->cebianlanbj == '3') {
		$s .= "#primary{width: 100%;}";
	}
	if ($zbp->Config('zbpNana')->wenzhanglbybj == '2') {
		$s .= ".archive-list {border-bottom: none;background: #fff;margin: 0 0 15px;}.site-main .border_gray {border:none;background: #f2f2f2;}#post_list_box .abc-site {margin: 0 0 15px;}";
	}
	if ($zbp->Config('zbpNana')->wenzhanglbytpbj == '2') {
		$s .= ".archive-list .thumbnail {float: right;margin: 0 0 0 20px;}#post_list_box .archive-tag {left:15px;}";
	}
	$zbp->header .= '	<style type="text/css">'.$s.'</style>' . "\r\n";
}
function zbpNana_is_mobile() {
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

function zbpNana_tupian_alt( &$template ){
        global $zbp,$altURL;
		$article = $template->GetTags('article');
        $imgtitle = $article->Title;
        $imgUrl = "<img\s[^>]*src=(\"??)([^\" >]*?)\\1[^>]*>";
        if(preg_match_all("/$imgUrl/siU",$article->Content,$matches,PREG_SET_ORDER)){
                if( !empty($matches) ){
                        for ($i=0; $i < count($matches); $i++){
                                $tag = $url = $matches[$i][0];
								$j=$i+1;
                                $altURL = ' alt="'.$imgtitle.'第'.$j.'张-'.$zbp->name.'" title="'.$imgtitle.'第'.$j.'张-'.$zbp->name.'" ';
                                $url = rtrim($url,'>');
                                $url .= $altURL.'>';
								$content = str_replace($tag,$url,$article->Content);
								$article->Content = $content;
								$template->SetTags('article', $article);	   
                        }
                }
        }
}

function zbpNana_tupian_altqz(&$template){
	global $zbp;
	$article = $template->GetTags('article');
	$pattern = "/<img(.*?)src=('|\")([^>]*).(bmp|gif|jpeg|jpg|png|swf)('|\")(.*?)>/i";
	$replacement = '<img alt="'.$article->Title.'" src=$2$3.$4$5/>';
	$content = preg_replace($pattern, $replacement, $article->Content);
	$article->Content = $content;
	$template->SetTags('article', $article);
}

function zbpNana_links_nofollow(&$template){
	global $zbp;
	$article = $template->GetTags('article');
	preg_match_all('/<a(.*?)href="(.*?)"(.*?)>/',$article->Content,$matches);
	if($matches){
		foreach($matches[2] as $val){
			if(strpos($val,'://')!==false && strpos($val,$zbp->host)===false && !preg_match('/\.(jpg|jepg|png|ico|bmp|gif|tiff)/i',$val)){
				if ($zbp->Config('zbpNana')->wzwlgoto_kg){
					$content=str_replace("href=\"$val\"", "href=\"{$zbp->host}zb_users/theme/{$zbp->theme}/goto/?url=$val\"  rel=\"nofollow\" ",$article->Content);
				}else{
					$content=str_replace("href=\"$val\"", "href=\"$val\"  rel=\"nofollow\" ",$article->Content);
				}
				$article->Content = $content;
				$template->SetTags('article', $article);	 
			}
		}
	}
}

function zbpNana_links_goto($url) {
	global $zbp;
    if(strpos($url,'://')!==false && strpos($url,$zbp->host)===false) {
    $url = str_replace($url, "{$zbp->host}zb_users/theme/{$zbp->theme}/goto/?url=$url",$url);
         }
    return $url;
}

function zbpNana_get_author_class($comment_author_email){
    global $zbp;
    $comment=$zbp->table['Comment'];
	$adminEmail =$zbp->Config('zbpNana')->glyadmin;
	$author_count ='SELECT comm_Name,COUNT(*) AS alluser FROM '.$comment.' WHERE comm_Email ="'.$comment_author_email.'"';
	$array=$zbp->db->Query($author_count);
	$array=current($array);
	$author_count=GetValueInArray($array,'alluser');
	if($comment_author_email ==$adminEmail){
		 echo ' <span class="dengji">【'.$zbp->Config('zbpNana')->glych.'】</span>';
	}else{
	if($author_count>=1 && $author_count< 10){
		echo ' <span class="dengji">【'.$zbp->Config('zbpNana')->pldjch1.'】</span>';}
	else if($author_count>=10 && $author_count< 20){
		echo ' <span class="dengji">【'.$zbp->Config('zbpNana')->pldjch2.'】</span>';}
	else if($author_count>=20 && $author_count< 40){
		echo ' <span class="dengji">【'.$zbp->Config('zbpNana')->pldjch3.'】</span>';}
	else if($author_count>=40 && $author_count< 80){
		echo ' <span class="dengji">【'.$zbp->Config('zbpNana')->pldjch4.'】</span>';}
	else if($author_count>=80 && $author_count< 160){
		echo ' <span class="dengji">【'.$zbp->Config('zbpNana')->pldjch5.'】</span>';}			
	else if($author_count>=160 &&$author_count< 320){
		echo ' <span class="dengji">【'.$zbp->Config('zbpNana')->pldjch6.'】</span>';}
	else if($author_count>=320 && $author_count< 640){
		echo ' <span class="dengji">【'.$zbp->Config('zbpNana')->pldjch7.'】</span>';}
	else if($author_count>=640 && $author_count< 1280){
		echo ' <span class="dengji">【'.$zbp->Config('zbpNana')->pldjch8.'】</span>';}
	else if($author_count>= 1280){
		echo ' <span class="dengji">【'.$zbp->Config('zbpNana')->pldjch9.'】</span>';}
	}
}

function zbpNana_GetArticleCategorys($Rows,$CategoryID,$hassubcate){
        global $zbp;
    $ids = strpos($CategoryID,',') !== false ? explode(',',$CategoryID) : array($CategoryID);
    $wherearray=array(); 
    foreach ($ids as $cateid){
      if (!$hassubcate) {
        $wherearray[]=array('log_CateID',$cateid); 
      }else{
                $wherearray[] = array('log_CateID', $cateid);
                foreach ($zbp->categorys[$cateid]->SubCategorys as $subcate) {
                    $wherearray[] = array('log_CateID', $subcate->ID);
                }
      }
    }
    $where=array( 
                    array('array',$wherearray), 
                    array('=','log_Status','0'), 
                    ); 
 
    $order = array('log_PostTime'=>'DESC'); 
    $articles=    $zbp->GetArticleList(array('*'),$where,$order,array($Rows),'');     
 
        return $articles;
}

function zbpNana_AddMenu(&$m){
	global $zbp;
	array_unshift($m, MakeTopMenu("root",'zbpNana主题配置',$zbp->host . "zb_users/theme/zbpNana/main.php?act=ztsm","","topmenu_zbpNana"));
}
function zbpNana_SubMenu($id){
	$arySubMenu = array(
		0 => array('主题说明', 'ztsm', 'left', false),
		1 => array('图片设置', 'tpsz', 'left', false),
		2 => array('基本设置', 'jbsz', 'left', false),
		3 => array('CMS设置', 'cmssz', 'left', false),
		4 => array('功能开关', 'gnkg', 'left', false),
		5 => array('幻灯片设置', 'slide', 'left', false),
		6 => array('广告设置', 'absz', 'left', false),
		7 => array('广告轮播设置', 'taobao', 'left', false),
		8 => array('评论等级设置', 'dengji', 'left', false),
	);
	foreach($arySubMenu as $k => $v){
		echo '<a href="?act='.$v[1].'" '.($v[3]==true?'target="_blank"':'').'><span class="m-'.$v[2].' '.($id==$v[1]?'m-now':'').'">'.$v[0].'</span></a>';
	}
}

function zbpNana_wenzhangxg(){
    global $zbp,$article;
	if ($_GET['act'] == 'PageEdt'){
		echo '<div class="editmod"><label for="meta_zbpNana_pstitle" class="editinputname">SEO标题</label><br/><input type="text" name="meta_zbpNana_pstitle" value="'.htmlspecialchars($article->Metas->zbpNana_pstitle).'" style="width:50%;"/><br/></div><div class="editmod"><label for="meta_zbpNana_psguanjianci" class="editinputname">SEO关键词</label><br/><input type="text" name="meta_zbpNana_psguanjianci" value="'.htmlspecialchars($article->Metas->zbpNana_psguanjianci).'" style="width:50%;"/></div><div class="editmod"><label for="meta_zbpNana_psmiaoshu" class="editinputname">SEO描述</label><br/><textarea name="meta_zbpNana_psmiaoshu" type="text" rows="6" cols="50">'.htmlspecialchars($article->Metas->zbpNana_psmiaoshu).'</textarea></div>';
	}else{
   	echo '<div class="editmod"><label for="meta_zbpNana_suoluetu" class="editinputname">指定缩略图地址</label><input type="text" name="meta_zbpNana_suoluetu" value="'.htmlspecialchars($article->Metas->zbpNana_suoluetu).'" style="width:50%;"/><br/>*输入指定图片地址作为缩略图，权重：指定缩略图>文章第一张图片>随机图片。</div><div class="editmod"><label class="editinputname">文章类型&nbsp;&nbsp;</label><label><input type="radio" id="wzlx_yc" name="meta_zbpNana_wzlx" value="1" '.($article->Metas->zbpNana_wzlx ==2?'':$article->Metas->zbpNana_wzlx ==3?'':'checked="checked"').' />原创文章(默认)</label>&nbsp;&nbsp;<label><input type="radio" id="wzlx_zz" name="meta_zbpNana_wzlx" value="2" '.($article->Metas->zbpNana_wzlx ==2?'checked="checked"':'').'/>转载文章</label>&nbsp;&nbsp;<label><input type="radio" id="wzlx_tg" name="meta_zbpNana_wzlx" value="3" '.($article->Metas->zbpNana_wzlx ==3?'checked="checked"':'').'/>投稿文章</label></div><div class="editmod"><label for="meta_zbpNana_zuozhe" class="editinputname">文章作者</label><input type="text" name="meta_zbpNana_zuozhe" value="'.htmlspecialchars($article->Metas->zbpNana_zuozhe).'" style="width:50%;"/><br/>*转载或投稿文章的作者。</div><div class="editmod"><label for="meta_zbpNana_laiyuan" class="editinputname">文章来源</label><input type="text" name="meta_zbpNana_laiyuan" value="'.htmlspecialchars($article->Metas->zbpNana_laiyuan).'" style="width:50%;"/><br/>*转载或投稿文章的来源地址。</div><p><span class="title">是否添加到站长推荐:</span><br><input type="text" id="meta_zbpNana_zhanzhang" name="meta_zbpNana_zhanzhang" class="checkbox" value="'.htmlspecialchars($article->Metas->zbpNana_zhanzhang).'"/></p>';
	}
}

//插入js变量
function zbpNana_Html_Js_Add(){
	global $zbp;
	$zbpNanazanalert=$zbp->Config('zbpNana')->chongfudianzan;
	echo "\r\n".'var $zbpNanazanalert="'.htmlspecialchars($zbpNanazanalert).'"'."\r\n";
}

function zbpNana_fenleiseo(){
	global $zbp,$cate;
   	echo '<p><span class="title">SEO标题:</span><br><input id="meta_zbpNana_fltitle" class="edit" size="40" name="meta_zbpNana_fltitle" type="text" value="'.htmlspecialchars($cate->Metas->zbpNana_fltitle).'"><br/>*显示该分类的SEO标题。</p><p><span class="title">关键词:</span><br><input id="meta_zbpNana_flgjc" class="edit" size="40" name="meta_zbpNana_flgjc" type="text" value="'.htmlspecialchars($cate->Metas->zbpNana_flgjc).'"><br/>*多个关键词请以英文逗号（,）隔开。</p>';
}


function zbpNana_biaoqianseo(){
	global $zbp,$tag;
   	echo '<p><span class="title">SEO标题:</span><br><input id="meta_zbpNana_bqtitle" class="edit" size="40" name="meta_zbpNana_bqtitle" type="text" value="'.htmlspecialchars($tag->Metas->zbpNana_bqtitle).'"><br/>*显示该标签的SEO标题。</p><p><span class="title">关键词:</span><br><input id="meta_zbpNana_bqgjc" class="edit" size="40" name="meta_zbpNana_bqgjc" type="text" value="'.htmlspecialchars($tag->Metas->zbpNana_bqgjc).'"><br/>*多个关键词请以英文逗号（,）隔开。</p>';
}
						
function zbpNana_remenTags(){
	global $zbp,$sidebarcstag;
	$rmtagnum=$zbp->Config('zbpNana')->rementags_num;
	$tagArray = $zbp->GetTagList('','',array('tag_Count'=>'DESC'),array($rmtagnum),'');	
	foreach ($tagArray as $tag) {
		$sidebarcstag .= '<li class="alert_box_tags_item"><a href="'.$tag->Url.'" title="'.$tag->Count.'个话题" target="_blank" rel="nofollow">'.$tag->Name.'</a></li>';
	}
	return $sidebarcstag;
}




//选择替换图片
define( 'zbpNana_THIS','zbpNana');
define( 'zbpNana_ROOT_DIR',plugin_dir_path(zbpNana_THIS));
define( 'zbpNana_ROOT_URL',plugin_dir_url(zbpNana_THIS));
function zbpNana_Get_Logo($name='logo',$type='png'){
  $path = zbpNana_ROOT_DIR.'zbpNana/image/'.$name.'.'.$type;
  if (file_exists($path)){
        echo zbpNana_ROOT_URL.'zbpNana/image/'.$name.'.'.$type;
    }else{
        echo zbpNana_ROOT_URL.'zbpNana/image/'.$name.'1.'.$type;
    }
}


function zbpNana_CreateTable(){
    global $zbp;
	if ($zbp->db->ExistTable($GLOBALS['blog_plugin_zbpNana_prise_Table']) == false) {
		$s = $zbp->db->sql->CreateTable($GLOBALS['blog_plugin_zbpNana_prise_Table'], $GLOBALS['blog_plugin_zbpNana_prise_DataInfo']);
		$zbp->db->QueryMulit($s);
	}
}
function InstallPlugin_zbpNana() {
	global $zbp;
	zbpNana_CreateTable();
	if(!$zbp->Config('zbpNana')->HasKey('Version')){
		$zbp->Config('zbpNana')->Version = '1.0';
		$zbp->Config('zbpNana')->shouyebuju = '1';
		$zbp->Config('zbpNana')->cebianlanbj = '1';
		$zbp->Config('zbpNana')->cblbiaoqian = '1';
		$zbp->Config('zbpNana')->tupianalt = '3';
		$zbp->Config('zbpNana')->wenzhanglbybj = '1';
		$zbp->Config('zbpNana')->wenzhanglbytpbj = '1';
		$zbp->Config('zbpNana')->fanyeanniu = '1';
        $zbp->Config('zbpNana')->lianjiefu = '-';
		$zbp->Config('zbpNana')->Keywords = '请填写站点关键词，多个请用英文逗号隔开';
        $zbp->Config('zbpNana')->Description = '请填写站点描述';
		$zbp->Config('zbpNana')->xgwz_num = '8';
$zbp->Config('zbpNana')->rementags_num = '15';
$zbp->Config('zbpNana')->gonggaolan = '<li class="scrolltext-title"><a href="https://www.yigujin.cn/nana/" rel="bookmark" target="_blank">zblogPHP响应式主题:zbpNana</a></li><li class="scrolltext-title"><a href="https://www.yigujin.cn/nana/" rel="bookmark" target="_blank">zblogPHP响应式主题:zbpNana</a></li>';
$zbp->Config('zbpNana')->youshangjue = '<li><a href="https://www.yigujin.cn/zxly">在线留言</a></li><li><a href="http://boke112.com/">博客导航</a></li>';
$zbp->Config('zbpNana')->zuoshangjue = '您好，欢迎使用zbpNana主题&nbsp;&nbsp;|&nbsp;<a href="{$host}zb_system/login.php" target="_blank">登录</a>';
$zbp->Config('zbpNana')->chongfudianzan = '你已经点过一次了，可以了，谢谢！！！';
$zbp->Config('zbpNana')->banquanxinxi = 'Copyright ©&nbsp; zbpNana主题 &nbsp; | &nbsp;  <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">暂无备案</a>';
$zbp->Config('zbpNana')->yejiaoanniu1 = '<a href="http://user.qzone.qq.com/123456789" target="_blank">我的QQ空间</a>';
$zbp->Config('zbpNana')->yejiaoanniu2 = '<a href="http://weibo.com/weibo" target="_blank">我的新浪微博</a>';
$zbp->Config('zbpNana')->yejiaoxiangguan = '<li><span class="post_spliter">•</span><a href="https://www.yigujin.cn/nana/" target="_blank">Nana主题</a></li><li><span class="post_spliter">•</span><a href="https://www.yigujin.cn/zbpnana/" target="_blank">zbpNana主题</a></li><li><span class="post_spliter">•</span><a href="https://www.yigujin.cn/blogs/" target="_blank">Blogs主题</a></li><li><span class="post_spliter">•</span><a href="https://www.yigujin.cn/549.html" target="_blank">WordPress教程</a></li><li><span class="post_spliter">•</span><a href="https://www.yigujin.cn/722.html" target="_blank">Nana赞助</a></li><li><span class="post_spliter">•</span><a href="https://www.yigujin.cn/1350.html" target="_blank">赞助说明</a></li><li><span class="post_spliter">•</span><a href="http://laoxuezhujizenmeyang.com/" target="_blank">老薛主机怎么样</a></li><li><span class="post_spliter">•</span><a href="https://boke112.com/" target="_blank">boke112导航</a></li>';
$zbp->Config('zbpNana')->hdpsz_dm = '<li><a target="_blank" href="https://www.yigujin.cn/zbpnana"><img src="zb_users/theme/zbpNana/image/hdp/170425_zbpNana.jpg" alt="zblogPHP清新响应式主题zbpNana" ></a><p class="slider-caption">zblogPHP清新响应式主题zbpNana</p></li>';
$zbp->Config('zbpNana')->slsljan = '<li><a href="">返回首页</a></li><li><a href="">留言反馈</a></li><li><a href="">联系站长</a></li>';
		$zbp->SaveConfig('zbpNana');
}
$zbp->SaveConfig('zbpNana');	
}

function UninstallPlugin_zbpNana() {
	global $zbp;
}
