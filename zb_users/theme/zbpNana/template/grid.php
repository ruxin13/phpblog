<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNana主题页面</h2><h3>请尊重版权购买正版主题，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
{template:header}
	<div id="content" class="site-content">
	<!-- 全屏广告 -->
{if $zbp->Config('zbpNana')->DisplayAd1=='1'}
<div id="abcdh" class="abc-pc abc-site">
	{if zbpNana_is_mobile()}
		{$zbp->Config('zbpNana')->Adm1}
	{else}
		{$zbp->Config('zbpNana')->Ad1}
	{/if}
</div>
{/if}
		{if $zbp->Config('zbpNana')->hdpsz_kg=='1'}
		{if $type=='index'&&$page=='1'} 
		{template:slider}
		{/if}
			{/if}

		<div id="primarys" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="clear"></div>		
		<div class="cat-box">
			<div class="cat-site">
				<ul class="cat-one-list">
					
		{foreach $articles as $article}
				<div class="cat-lists">						
						<div class="item-st">					
						<div class="thimg">
						<span class="pic-num">{php}echo zbpNana_get_post_images_number($article->ID){/php}图</span>	
						{php}echo zbpNana_thumbnail($article->ID,280,210,1);{/php}	
						</div>
						<h3><a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></h3>						
						<div class="pricebtn">
								<span class="date">{$article.Time('Y-m-d')}</span>
								<span class="views">  阅读 {$article.ViewNums} 次  </span></div>
						</div>					
					</div>							
			{/foreach}	
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>				
		</main><!-- .site-main -->
		{template:pagebar}	
	</div><!-- .content-area -->
<div class="clear"></div>
	</div><!-- .site-content -->				
{template:footer}