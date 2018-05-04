{* Template Name:文章页单页 *}
{template:header}

<body class="single {$type}">
<header class="header">
  <div class="container">
    <div class="logo fl"> {php}
    if($zbp->Config('um_blog')->logo){
    $logo = $zbp->Config('um_blog')->logo;
    }else{
    $logo = $host."zb_users/theme/".$theme."/style/images/logo.png";
    }
    {/php} 
    <a href="{$host}" title="{$name}" rel="home"><img src="{$logo}" alt="{$name}"></a> </div>
    <div class="navBar fr">
      <ul class="nav">
        {$modules['navbar'].Content}
      </ul>
    </div>
    <div class="clear"></div>
  </div>
</header>
<section class="warp">
<div class="container">
<div class="orw">
  <div id="article"> 
  {if $article.Type==ZC_POST_TYPE_ARTICLE}
  {template:post-single}
  {else}
  {template:post-page}
  {/if}
  </div>
  <div id="divSidebar" class="sidebar"> {template:sidebar} </div>
</div>
{template:footer}
