{if $type=='index'}
<title>{$name}{if $page>'1'}{$zbp->Config('Blogs')->lianjiefu}第{$pagebar.PageNow}页{/if}{$zbp->Config('Blogs')->lianjiefu}{$subname}</title>
<meta name="Keywords" content="{$zbp->Config('Blogs')->Keywords},{$name}">
<meta name="description" content="{$zbp->Config('Blogs')->Description}">
{elseif $type=='category'} 
<title>{if $category.Metas.Blogs_fltitle}{$category.Metas.Blogs_fltitle}{else}{$category.Name}{/if}{if $page>'1'}{$zbp->Config('Blogs')->lianjiefu}第{$pagebar.PageNow}页{/if}{$zbp->Config('Blogs')->lianjiefu}{$name}</title>
<meta name="Keywords" content="{if $category.Metas.Blogs_flgjc}{$category.Metas.Blogs_flgjc}{else}{$category.Name}{/if},{$name}">
<meta name="description" content="{$category.Intro}">
{elseif $type=='article'}
<title>{$title}{$zbp->Config('Blogs')->lianjiefu}{$article.Category.Name}{$zbp->Config('Blogs')->lianjiefu}{$name}</title>
  {php}
    $aryTags = array();
    foreach($article->Tags as $key){
      $aryTags[] = $key->Name;
    }
    if(count($aryTags)>0){
        $keywords = implode(',',$aryTags);
    } else {
        $keywords = $zbp->name;
    }
	if (strlen($article->Intro)>0){
	$description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Intro,'[nohtml]'),135)).'...');
	}else{
    $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');
	}
  {/php}
<meta name="keywords" content="{$keywords}"/>
<meta name="description" content="{$description}"/>
<meta name="author" content="{$article.Author.StaticName}">
{elseif $type=='page'}
<title>{if $article.Metas.Blogs_pstitle}{$article.Metas.Blogs_pstitle}{else}{$title}{/if}{$zbp->Config('Blogs')->lianjiefu}{$name}</title>
<meta name="keywords" content="{if $article.Metas.Blogs_psguanjianci}{$article.Metas.Blogs_psguanjianci}{else}{$title},{$name}{/if}"/>
  {php}
	if (strlen($article->Metas->Blogs_psmiaoshu)>0){
	$description = $article->Metas->Blogs_psmiaoshu;
	}else{
    $description = preg_replace('/[\r\n\s]+/', ' ', trim(SubStrUTF8(TransferHTML($article->Content,'[nohtml]'),135)).'...');
	}
  {/php}
<meta name="description" content="{$description}"/>
<meta name="author" content="{$article.Author.StaticName}">  
{elseif $type=='tag'}  
<title>{if $tag->Metas->Blogs_bqtitle}{$tag.Metas.Blogs_bqtitle}{else}{$tag.Name}{/if}{if $page>'1'}{$zbp->Config('Blogs')->lianjiefu}第{$pagebar.PageNow}页{/if}{$zbp->Config('Blogs')->lianjiefu}{$name}</title>
<meta name="Keywords" content="{if $tag->Metas->Blogs_bqgjc}{$tag.Metas.Blogs_bqgjc}{else}{$tag.Name}{/if},{$name}">
<meta name="description" content="{$tag.Intro}">
{else}
<title>{$title}{$zbp->Config('Blogs')->lianjiefu}{$name}{if $page>'1'}{$zbp->Config('Blogs')->lianjiefu}第{$pagebar.PageNow}页{/if}</title>
<meta name="Keywords" content="{$title},{$name}">
<meta name="description" content="{$title}{$zbp->Config('Blogs')->lianjiefu}{$name}{if $page>'1'}{$zbp->Config('Blogs')->lianjiefu}第{$pagebar.PageNow}页{/if}"> 
{/if}