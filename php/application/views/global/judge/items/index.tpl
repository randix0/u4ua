{if $judges}
    {foreach from=$judges item=item}
        <div class="b-judges-item">
            <a class="b-judges-item-video" href="{$SITE_URL}judge/{$item.id}">
                <div class="play"></div>
            </a>
            <div class="b-judges-item-desc">
                <div class="b-judges-item-iname">{$item.first_name} {$item.last_name}</div>
                <span class="b-judges-item-position"><span class="company">microsoft</span>, {$item.role}</span>
                <div class="b-judges-item-idesc">{$item.idesc}</div>
            </div>
        </div>
    {/foreach}
{/if}