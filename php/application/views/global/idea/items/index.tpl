{foreach from=$ideas item=item}
<div class="b-ideas-item">
    <a class="b-ideas-item-img" href="/idea/{$item.id}" style="background-image: url({$item.youtube_img});">
        <div class="b-ideas-item-play"></div>
    </a>
    <a class="b-ideas-item-iname" href="/idea/{$item.id}">{$item.iname}</a>
    <time class="b-ideas-item-time">{$item.add_date|actionTime}</time>
    <a class="b-ideas-item-vote" onclick="U4ua.idea.vote({$item.id});">
        ПІДТРИМУЙ!
    </a>
    <div class="tCenter">
        <div class="b-ideas-item-rating">Судьи: <div class="b-ideas-item-ratingStars s1"></div></div>
    </div>
</div>
{/foreach}