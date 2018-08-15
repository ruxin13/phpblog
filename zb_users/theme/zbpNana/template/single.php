
{template:header}
<div id="content" class="site-content">	
<div class="clear"></div>
	<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		{if $article.Type==0}
        {template:post-single}
            {else}
            {template:post-page}
            {/if}	
	</main><!-- .site-main -->
	</div><!-- .content-area -->
{if ($zbp->Config('zbpNana')->cebianlanbj !== '3') }
<div id="sidebar" class="widget-area">	
{template:sidebar2}	
</div>
{/if}
</div>
<div class="clear"></div>
{template:footer}