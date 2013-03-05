{if $team}
    {foreach from=$team item=item}
        <div class="b-idea-team-item">
            <a class="b-idea-team-item-avatar" style="background-image: url(/{$item.avatar_b});"></a>
            <a class="b-idea-team-item-iname">{$item.first_name} {$item.last_name}</a>
            <div class="b-idea-team-item-idesc">{$item.role}</div>
        </div>
    {/foreach}
{/if}