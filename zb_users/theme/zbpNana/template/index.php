<?php echo'<meta charset="UTF-8"><div style="text-align:center;padding:60px 0;font-size:16px;"><h2 style="font-size:60px;margin-bottom:32px;color:f00;">zbpNana主题页面</h2><h3>请尊重版权购买正版主题，喜欢这个的主题可以联系我们！</h3><h2 style="font-size:50px;margin-bottom:32px;color:f00;">QQ：2226524923</h2></div>';die();?>
{if $type=='index'}
{if $zbp->Config('zbpNana')->shouyebuju=='2'}
{template:cms}
{elseif $zbp->Config('zbpNana')->shouyebuju=='3'}
{template:grid}
{else}
{template:blog}
{/if}
{else}
{if $zbp->Config('zbpNana')->fltpbj_kg=='1'}
{template:post-grid}
{else}
{template:post-cat}
{/if}
{/if}