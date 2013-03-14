{if isset($errors) && $errors}
    {foreach from=$errors item=code}
        <h3>{l}ALERTS_error_{$code}{/l}</h3>
    {/foreach}
{else}
    <h3>{l}ALERTS_error{/l}!</h3>
{/if}