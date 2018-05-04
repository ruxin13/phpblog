{* Template Name:列表页单条置顶文章 *}
{php}
$intro=preg_replace("/<(.*?)>/","",$article->Content); 
$intro=str_replace("&nbsp;"," ",$intro); 
$intro=trim(SubStrUTF8($intro,135)).'...'
{/php}

<div class="post istop">
    <div class="post-head">
        <h1 class="post-title"><a href="{$article.Url}" title="{$article.Title}">{$article.Title}</a></h1>
        <div class="post-meta">
            <span class="author"><em>{$lang['msg']['author']}:{$article.Author.StaticName}</em><em>{$article.Time('Y年m月d日')}</em><em>{$lang['um_blog']['view']}:{$article.ViewNums}</em></span>
        </div>
    </div>
{php}
    $randimg=mt_rand(1,4);
    $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
    $content = $article->Content;
    preg_match_all($pattern,$content,$matchContent);
    if(isset($matchContent[1][0]))
        $randimg=$matchContent[1][0];
    else
        $randimg=$zbp->host."zb_users/theme/ymbk/style/img/$randimg.jpg";
{/php}
    <div class="post-media">
        <a href="{$article.Url}" title="{$article.Title}">
            <img src="{$randimg}" /><b>置顶</b>
        </a>
    </div>
    <div class="post-content">
       <p>{$intro}</p>
    </div>
    <div class="post-link">
        <a href="{$article.Url}" class="btn btn1">阅读全文</a>
    </div>
</div>