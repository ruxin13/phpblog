
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
