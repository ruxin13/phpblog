
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