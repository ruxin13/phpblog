
{template:header}
	<div id="content" class="site-content">
		<div class="clear"></div>
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