<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="Cache-Control" content="no-transform">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="renderer" content="webkit">
<meta name="applicable-device" content="pc,mobile">
<meta name="HandheldFriendly" content="true"/>
<meta name="robots" content="index,follow"/>
{template:seo}
<link rel="shortcut icon" href="{php}zbpNana_Get_Logo('favicon','ico');{/php}">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!--[if lt IE 9]><script src="{$host}zb_users/theme/{$theme}/script/html5-css3.js"></script><![endif]-->
<link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/{$style}.css" type="text/css" media="all"/>
<script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script>
<script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script>
<script src="{$host}zb_users/theme/{$theme}/script/custom.js" type="text/javascript"></script>
<script src="{$host}zb_users/theme/{$theme}/script/slides.js" type="text/javascript"></script>
<script src="{$host}zb_users/theme/{$theme}/script/stickySidebar.js" type="text/javascript"></script>
<script src="{$host}zb_users/theme/{$theme}/script/script.js" type="text/javascript"></script>
{if $zbp->Config('zbpNana')->Displaytb1=='1' || $zbp->Config('zbpNana')->Displaytb2=='1'}
<script src="{$host}zb_users/theme/{$theme}/script/flexisel.js" type="text/javascript"></script>
{/if}
<script src="{$host}zb_users/theme/{$theme}/script/scrollmonitor.js" type="text/javascript"></script>
{if $zbp->Config('zbpNana')->cblbiaoqian=='3' && $zbp->Config('zbpNana')->cebianlanbj !== '3'}
<script src="{$host}zb_users/theme/{$theme}/script/3dtag.js" type="text/javascript"></script>
{/if}
<!--[if IE]>
<div class="tixing"><strong>温馨提示：感谢您访问本站，经检测您使用的浏览器为IE浏览器，为了获得更好的浏览体验，请使用Chrome、Firefox或其他浏览器。</strong>
</div>
<![endif]-->
<link rel="stylesheet" id="font-awesome-four-css" href="{$host}zb_users/theme/{$theme}/fonts/fontawesome-all.css" type='text/css' media='all'/>
{$header}
{if $type=='index'&&$page=='1'}
	<link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}" />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="{$host}zb_system/xml-rpc/?rsd" />
	<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{$host}zb_system/xml-rpc/wlwmanifest.xml" /> 
{/if}
{$zbp->Config('zbpNana')->baidutongji}
</head>
<body class="{$type}">
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header">
		<!-- #top-header -->
		<div id="menu-box">
			<div id="top-menu">
				<div class="logo-site">
					<{if $type=='index'}h1{else}div{/if} class="site-title">
						<a href="{$host}" title="{$name}-{$title}">
							<img src="{php}zbpNana_Get_Logo('logo','png');{/php}" width="220" height="50" alt="{$name}-{$title}" title="{$name}-{$title}"/>
							<span>{$name}</span>
						</a>
					</{if $type=='index'}h1{else}div{/if}>
				</div><!-- .logo-site -->			
				<span class="nav-search"><i class="fa fa-search"></i></span>
				<div id="site-nav-wrap">
					<div id="sidr-close"><a href="#sidr-close" class="toggle-sidr-close">X</a></div>
					<nav id="site-nav" class="main-nav"> 
						<a href="#sidr-main" id="navigation-toggle" class="bars"><i class="fa fa-bars"></i></a> 
						<div id="divNavBar-main">
							<ul id="menu-main" class="down-menu nav-menu">
								{module:navbar}
							</ul>
						</div> 
					</nav>
				</div><!-- #site-nav-wrap -->
			</div><!-- #top-menu -->
		</div><!-- #menu-box -->
	</header><!-- #masthead -->
<div id="main-search">
	<div id="searchbar">
	<form id="searchform" name="search" method="post" action="{$host}zb_system/cmd.php?act=search">
	<input type="text" name="q" placeholder="输入搜索内容"> 
	<button type="submit" id="searchsubmit">搜索</button>
	</form>
	</div>
	<div id="sstags" class="plxiaoshi">
	<ul id="alert_box_tags">
	{php}echo zbpNana_remenTags();{/php}
	<div class="clear"></div>
            </ul>
			<ul id="alert_box_more">
                <li class="alert_box_more_left"></li>
                <p class="alert_box_more_main"><a href="{$zbp->Config('zbpNana')->rementags_url}"  target="_blank">查看更多热门标签</a></p>
                <li class="alert_box_more_right"></li>
            </ul>
</div>		
	<div class="clear"></div>
</div>
