<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNana主题页面</h2><h3>请尊重版权购买正版主题，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
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
