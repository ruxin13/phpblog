{php}$i = $zbp->modulesbyfilename['tags']->MaxLi;if ($i == 0) $i = 20;	$tagArray = $zbp->GetTagList('','',array('tag_Count'=>'DESC'),array($i),'');	{/php}	{if $zbp->Config('zbpNana')->cblbiaoqian=='1'}<ul id="divTags-1">{foreach $tagArray as $tag}<li><a href="{$tag.Url}">{$tag.Name}<span class="tag-count"> ({$tag.Count})</span></a></li>{/foreach}</ul>{/if}{if $zbp->Config('zbpNana')->cblbiaoqian=='2'}<div class="tagcloud">	{foreach $tagArray as $tag}		{php}$tagscolor = dechex(rand(0,16777215));$tagssize = rand(5,22)+rand(111,999)*0.001;		{/php}		<a href="{$tag->Url}" title="{$tag->Count}个话题" style="color:#{$tagscolor};font-size:{$tagssize}pt;" target="_blank" rel="nofollow">{$tag->Name}</a>		{/foreach}</div>{/if}{if $zbp->Config('zbpNana')->cblbiaoqian=='3'}<div id="tag_cloud_widget">	{foreach $tagArray as $tag}		<a href="{$tag->Url}" title="{$tag->Count}个话题" target="_blank" rel="nofollow">{$tag->Name}</a>	{/foreach}</div>{/if}