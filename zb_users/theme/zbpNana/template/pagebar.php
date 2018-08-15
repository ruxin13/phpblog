
<nav class="navigation pagination" role="navigation">
{if $zbp->Config('zbpNana')->fanyeanniu <='1'}
<div class="nav-links">
{else}
<div class="nav-links" style="display:none;">
{/if}
{if $pagebar}
{foreach $pagebar.buttons as $k=>$v}
{if $pagebar.PageAll>1}
{if $pagebar.PageNow==$k}
<span class='page-numbers current'>{$k}</span>
{elseif $k=='‹'}
<span class="prev"><a class="page-numbers" href="{$v}" title="上一页"><i class="fa fa-angle-left"></i></a></span>
{elseif $k=='›'}
<span class="next"><a class="page-numbers" href="{$v}" title="下一页"><i class="fa fa-angle-right"></i></a></span>
{elseif $k=='‹‹'}
{if $pagebar.PageNow!=1}
<a class="page-numbers" href="{$v}" title="第1页"><i class="fa fa-angle-double-left"></i></a>
{/if}
{elseif $k=='››'}
{if $pagebar.PageNow!=$pagebar.PageLast}
<a class="page-numbers" href="{$v}" title="最后一页"><i class="fa fa-angle-double-right"></i></a>
{/if}
{else}
<a class="page-numbers" href="{$v}" title="第{$k}页">{$k}</a>
{/if}
{/foreach}
{/if}
{/if}
</div>
</nav>
