<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNana主题页面</h2><h3>请尊重版权购买正版主题，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
{template:header}
	<div id="content" class="site-content">
	{if $zbp->Config('zbpNana')->DisplayAd1=='1'}
<div id="abcdh" class="abc-pc abc-site">
	{if zbpNana_is_mobile()}
		{$zbp->Config('zbpNana')->Adm1}
	{else}
		{$zbp->Config('zbpNana')->Ad1}
	{/if}
</div>
{/if}
<div id="contentab">
		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
				{if $zbp->Config('zbpNana')->hdpsz_kg=='1'}
				{if $type=='index'&&$page=='1'} 
		{template:slider}
			{/if}
				{/if}
		<!-- 最新文章代码 -->
{if $zbp->Config('zbpNana')->cms_zxwz_kg=='1'}
		{template:new_post}
{/if}
		<div class="clear"></div>		
{if $zbp->Config('zbpNana')->Displaytb1=='1'}
	{template:taobao}
{/if}
		<!-- 双栏开始 -->
{if $zbp->Config('zbpNana')->cms_slwz_kg=='1'}
	<div class="line-big">
		{php}$slflid=$zbp->Config('zbpNana')->cms_slwz_flid;$arrayids = explode(',',$slflid);{/php}
		{foreach $arrayids as $dira}
		<div class="xl3 xm3">
		{php}$dirsa=(int)$dira;$slxhnum=$zbp->Config('zbpNana')->cms_slwz_num;{/php}
{foreach getlist($slxhnum,$dirsa) as $key=>$articlea}
{$i=$key}
{if $i==0}
			<div class="cat-box">
				<h3 class="cat-title"><span class="syfl">{$articlea.Category.Name}</span><span class="catmore"><a href="{$articlea.Category.Url}" title="更多{$articlea.Category.Name}文章">More></a></span></h3>
				<div class="clear"></div>
				<div class="cat-site">
					<div class="item"> 
					{php}echo zbpNana_thumbnail($articlea->ID,550,200,1);{/php}
<div style="z-index: 1;"> 			
<span class="txt"><a href="{$articlea.Url}" title="{$articlea.Title}">{$articlea.Title}</a></span>
<span class="txt-bg"></span>
</div>
		 
	</div>
					<div class="clear"></div>
					<ul class="cat-list">
						{else}		
						<span class="list-date">{$articlea.Time('m/d')}</span>						
						<li class="list-title"><a href="{$articlea.Url}" title="{$articlea.Title}">{trim(SubStrUTF8(TransferHTML($articlea->Title,'[nohtml]'),50))}</a></li>	
						{/if}							
	{/foreach}				
					</ul>

				</div>
			</div>
		</div>
		{/foreach}
		<div class="clear"></div>
	</div>
	{/if}
	<!-- 双栏结束 -->
	<!-- 单栏开始 -->
{if $zbp->Config('zbpNana')->cms_dlwz_kg=='1'}
	{php}$dlflid=$zbp->Config('zbpNana')->cms_dlwz_flid;$arrayid = explode(',',$dlflid);{/php}
	{foreach $arrayid as $dir}
	<div class="line-one">
	{php}$dirs=(int)$dir;$dlxhnum=$zbp->Config('zbpNana')->cms_dlwz_num;{/php}
	{foreach getlist($dlxhnum,$dirs) as $key=>$article}
	{$i=$key}
	{if $i==0}
		<div class="cat-box">
			<h3 class="cat-title"><span class="syfl">{$article.Category.Name}</span><span class="catmore"><a href="{$article.Category.Url}" title="更多{$article.Category.Name}文章">More></a></span></h3>
			<div class="clear"></div>
			<div class="cat-site">

					<div class="cat-dt">
						<figure class="line-one-thumbnail">		
						{php}echo zbpNana_thumbnail($article->ID,371,247,1);{/php}					
						</figure>
						<header class="entry-header">
							<h2 class="entry-title"><a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></h2>		
						</header><!-- .entry-header -->
						<div class="entry-content">	
							<div class="archive-content">			 				
								{if strlen($article.Intro)>0}
				{php}$intro= trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),100)).'...';{/php}
				{else}
				{php}$intro= trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),90)).'...';{/php}
			{/if}
			{$intro}
							</div>
							<div class="archive-tag">
								<span class="date">{$article.Time('Y-m-d')}</span>
								<span class="views">  阅读 {$article.ViewNums} 次  </span>{if Count($article.Tags)>0}{foreach $article.Tags as $tag}<a href="{$tag.Url}" target="_blank" rel="tag">{$tag.Name}</a>{/foreach}{/if}</div>
							<div class="clear"></div>
						</div><!-- .entry-content -->
					</div>
				{else}
				<div class="cat-lists">						
					<div class="item-st"> 
						<div class="thimg">
							{if ($zbp->Config('zbpNana')->cebianlanbj == '3') }
							{php}echo zbpNana_thumbnail($article->ID,327,150,1);{/php}
							{else}
							{php}echo zbpNana_thumbnail($article->ID,227,135,1);{/php}
							{/if}
						</div>
						<h3><a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a> </h3>						
						<div class="pricebtn"><span class="archive-tag">
								<span class="date">{$article.Time('Y-m-d')}</span>
								<span class="views">  阅读 {$article.ViewNums} 次  </span></span>
						</div>
					</div>												
				</div>							
				{/if}							
				{/foreach}
			<div class="clear"></div>
		</div>
		</div>
		<div class="clear"></div>	
	</div>	
{/foreach}
<!-- 单栏结束 -->
{/if}
		<div class="clear"></div>			
		</main><!-- .site-main -->
	</div><!-- .content-area -->
{if ($zbp->Config('zbpNana')->cebianlanbj !== '3') }
<div id="sidebar" class="widget-area">	
{template:sidebar}	
</div>
{/if}
</div>
<div class="clear"></div>
	</div><!-- .site-content -->		
{template:footer}