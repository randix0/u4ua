{if $attachments}
    {foreach from=$attachments item=item}
        <div class="left w210px mR10px">
            <a class="b-idea-getFile {$item.ext}" href="">{$item.iname}</a>
        </div>
    {/foreach}
{/if}