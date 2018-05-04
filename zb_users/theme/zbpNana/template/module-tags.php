<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNana主题页面</h2><h3>请尊重版权购买正版主题，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
{php}$i = $zbp->modulesbyfilename['tags']->MaxLi;if ($i == 0) $i = 20;
	$tagArray = $zbp->GetTagList('','',array('tag_Count'=>'DESC'),array($i),'');	{/php}
	
{if $zbp->Config('zbpNana')->cblbiaoqian=='1'}
<ul id="divTags-1">
{foreach $tagArray as $tag}
<li><a href="{$tag.Url}">{$tag.Name}<span class="tag-count"> ({$tag.Count})</span></a></li>
{/foreach}
</ul>
{/if}
{if $zbp->Config('zbpNana')->cblbiaoqian=='2'}
<div class="tagcloud">
	{foreach $tagArray as $tag}
		{php}$tagscolor = dechex(rand(0,16777215));$tagssize = rand(5,22)+rand(111,999)*0.001;
		{/php}
		<a href="{$tag->Url}" title="{$tag->Count}个话题" style="color:#{$tagscolor};font-size:{$tagssize}pt;" target="_blank" rel="nofollow">{$tag->Name}</a>	
	{/foreach}
</div>
{/if}
{if $zbp->Config('zbpNana')->cblbiaoqian=='3'}
<div id="tag_cloud_widget">
	{foreach $tagArray as $tag}
		<a href="{$tag->Url}" title="{$tag->Count}个话题" target="_blank" rel="nofollow">{$tag->Name}</a>
	{/foreach}
</div>
{/if}
