{* Template Name:公共头部 *} 
<!DOCTYPE html>
<html lang="{$lang['lang_bcp47']}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<meta name="generator" content="{$zblogphp}" />
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
{if $type=='article'}
<title>{$title}-{$article.Category.Name}-{$name}</title>
<meta name="keywords" content="{foreach $article.Tags as $tag}{$tag.Name},{/foreach}" />
<meta name="description" content="{$article.Title}是{$name}中一篇关于{foreach $article.Tags as $tag}{$tag.Name}{/foreach}的文章，欢迎您阅读和评论,{$name}" />
{elseif $type=='page'}
<title>{$title}-{$name}</title>
<meta name="keywords" content="{$title},{$name}"/>
{php}$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');{/php}
<meta name="description" content="{$description}"/>
<meta name="author" content="{$article.Author.StaticName}">
{elseif $type=='index'}
<title>{$name}{if $page>'1'}-第{$pagebar.PageNow}页{/if}-{$subname}</title>
<meta name="Keywords" content="{$zbp->Config('um_blog')->gjc}">
<meta name="description" content="{$zbp->Config('um_blog')->ms}">
{elseif $type=='category'}
<title>{$title}-{$name}</title>
<meta name="Keywords" content="{$title},{$name}">
<meta name="description" content="{$category.Intro}">
{else}
<title>{$title}-{$name}</title>
{/if}
<link rel="stylesheet" href="{$host}zb_users/theme/{$theme}/style/font-awesome-4.3.0/css/font-awesome.min.css" media="screen" type="text/css" />
<link rel="stylesheet" rev="stylesheet" href="{$host}zb_users/theme/{$theme}/style/um.css" type="text/css" media="all"/>
<script src="{$host}zb_system/script/jquery-2.2.4.min.js" type="text/javascript"></script> 
<script src="{$host}zb_system/script/zblogphp.js" type="text/javascript"></script> 
<script src="{$host}zb_system/script/c_html_js_add.php" type="text/javascript"></script> 
<script src="{$host}zb_users/theme/{$theme}/script/custom.js" type="text/javascript"></script> 
{$header}
{if $type=='index'&&$page=='1'}
<link rel="alternate" type="application/rss+xml" href="{$feedurl}" title="{$name}" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="{$host}zb_system/xml-rpc/?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="{$host}zb_system/xml-rpc/wlwmanifest.xml" />
{/if}
<style type="text/css">
#mnav li a:hover,.function .function_t:after,#mnav li a:hover,.navBar .nav li a:before{background:#{$zbp->Config('um_blog')->zs};}
#divSearchPanel input[type=submit],#divTags.function a:hover,.btn1{ border:1px solid #{$zbp->Config('um_blog')->zs};background:#{$zbp->Config('um_blog')->zs};}
#divNavBar a.on,#divNavBar a:hover{background:#{$zbp->Config('um_blog')->fs}}
a:hover,.function a:hover,.post .post-head .post-meta span a,
#BlogCopyRight a:hover,#BlogPowerBy a:hover{color:#{$zbp->Config('um_blog')->zs}}
</style>
</head>
