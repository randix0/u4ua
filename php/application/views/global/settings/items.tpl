{if $settings}
    <div class="b-settings">
    {foreach from=$settings item=item}
        <div class="b-settings-item">
            <form id="settings_{$item.code}" class="b-settings-item-wrap">
                <h3 class="b-settings-item-iname b-section-h3">{$item.iname}</h3>
                <code class="block mB10px">[{$item.code}]</code>
                <h4 class="b-settings-item-idesc b-section-h4">{$item.idesc}</h4>
                <input type="hidden" name="id" value="{$item.id}"/>
                <input type="hidden" name="code" value="{$item.code}"/>
                <div class="in-text mB25px"><input type="text" name="item[value]" value="{$item.value}"></div>
                <a class="button" onclick="Settings.save('{$item.code}');">{l}SAVE{/l}</a>
            </form>
        </div>
    {/foreach}
    </div>
{/if}

<style type="text/css">
    .b-settings {
        overflow: hidden;
    }
    .b-settings-item {
        position: relative;
        display: inline-block;
        width: 216px;
        margin: 10px 17px 10px 17px;
        padding: 0;
        border: 1px solid #eeeeee;
        box-shadow: 0 1px 3px rgba(197,197,197,0.56);
    }
    .b-settings-item-wrap {
        margin: 10px 15px;
    }
</style>