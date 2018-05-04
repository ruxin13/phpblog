<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNana主题页面</h2><h3>请尊重版权购买正版主题，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
{template:header}		
<div id="content" class="site-content">	
<div class="clear"></div>
		<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">	
					<article id="page-search"  class="link-page page">
<div class="search">
   <div id="searchbarsy">
	<form id="searchformsy" name="search" method="post" action="{$host}zb_system/cmd.php?act=search">
	<input type="text" name="q" placeholder="输入搜索内容"> 
	<button type="submit" id="searchsubmitsy">搜索</button>
	</form>
</div>
            </div>
</article>	
				<ul class="search-page">
				{foreach $articles as $article}
					<li class="search-inf">{$article.Time('Y年m月d日')}</li>
					<li class="entry-title">
						<a href="{$article.Url}" rel="bookmark" target="_blank">{$article.Title}</a>
					</li>
				{/foreach}	
		</main><!-- .site-main -->
		{template:pagebar}	
	</section><!-- .content-area -->
{if ($zbp->Config('zbpNana')->cebianlanbj !== '3') }
<div id="sidebar" class="widget-area">	
{template:sidebar}	
</div>
{/if}
</div>
	<div class="clear"></div>
</div><!-- .site-content -->
{template:footer}
