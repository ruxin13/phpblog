
{php}$cmszxwznum=$zbp->Config('zbpNana')->cms_zxwz_num;$catelist=$zbp->Config('zbpNana')->cms_zxwz_eflid;{/php}			
{if empty($catelist)}
{template:new_postm}
{else}
{template:new_postz}
{/if}