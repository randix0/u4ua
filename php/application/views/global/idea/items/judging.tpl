{foreach from=$ideas item=item}
    {if !$item.is_voted && !$item.is_ignored}
    <div id="ideas-item_{$item.id}" class="b-ideas-item" data-id="{if isset($item.raw_id) && $item.raw_id}{$item.raw_id}{else}{$item.id}{/if}">
        <a class="b-ideas-item-img b-ideas-item-click" data-id="{$item.id}" href="{$SITE_URL}idea/{$item.id}" style="background-image: url({$item.youtube_img});">
            <div class="b-ideas-item-play"></div>
        </a>
        <a class="b-ideas-item-iname b-ideas-item-click" data-id="{$item.id}" href="{$SITE_URL}idea/{$item.id}">{$item.iname}</a>
        <time class="b-ideas-item-time">{$item.add_date|actionTime}</time>
        <a class="b-ideas-item-vote" onclick="{if !$item.is_sample && !$item.is_deleted}U4ua.idea.vote({$item.id});{/if}">
            {if !$item.is_sample}{l}IDEAS_SUPPORT{/l}{else}{l}IDEAS_SAMPLE{/l}{/if}
        </a>
        <a class="b-ideas-item-ignore" onclick="{if !$item.is_sample && !$item.is_deleted}U4ua.idea.ignore({$item.id});{/if}">
            {l}IDEAS_IGNORE{/l}
        </a>
        <div class="tCenter">
            <div class="b-ideas-item-rating">{l}IDEAS_JUDGES{/l}: <a class="b-ideas-item-ratingStars s{$item.rating_stars}" title="{$item.rating_judges} votes"></a></div>
        </div>
    </div>
    {/if}
{/foreach}