{if $partners}
    {foreach from=$partners item=item}
        <div class="b-partners-item">
            <a class="b-partners-item-img" style="{if $item.youtube_img}background-image: url({$item.youtube_img});{elseif $item.avatar_m}background-image: url(/{$item.avatar_m});{/if}" href="{$SITE_URL}partner/{$item.id}">
                {if $item.youtube_code}
                    <div class="play"></div>
                {/if}
            </a>
            <div class="b-partners-item-desc">
                <div class="b-partners-item-iname">{$item.iname}</div>
                <a class="b-partners-item-link" href="{$item.url}">{$item.url}</a>
                <div class="b-partners-item-idesc">{$item.idesc}</div>
            </div>
            {if isset($USER_DATA) && $USER_DATA && isset($USER_DATA.access_level) && $USER_DATA.access_level > 50}
                <div class="tCenter mB20px">
                    <a href="/partner/edit/{$item.id}">edit</a>
                </div>
            {/if}
        </div>
    {/foreach}
{/if}