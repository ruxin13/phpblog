{* Template Name:首页及列表页 *}
{template:header}
<body class="multi {$type}">
<header class="header">
  <div class="container">
    <div class="logo fl"> {php}
      if($zbp->Config('um_blog')->logo){
      $logo = $zbp->Config('um_blog')->logo;
      }else{
      $logo = $host."zb_users/theme/".$theme."/style/images/logo.png";
      }
      {/php} <a href="{$host}" title="{$name}" rel="home"><img src="{$logo}" alt="{$name}"></a> </div>
    <div class="navBar fr">
      <ul class="nav">
        {module:navbar}
      </ul>
    </div>
    <div class="clear"></div>
  </div>
</header>
<section class="warp">
<div class="container">
<div class="orw">
  <div id="article">
    {foreach $articles as $article}
      {if $article.IsTop}
        {template:post-istop}
      {else}
        {template:post-multi}
      {/if}
    {/foreach}
    <div class="pagebar">{template:pagebar}</div>
  </div>
  <div id="divSidebar" class="sidebar"> {template:sidebar} </div>
</div>
{template:footer} 
