<section class="b-section b-section-idea">
    <div class="b-section-header layout w976px">
        <div class="b-section-header-iname">{l}PARTNERS_ONE{/l}</div>
    {if $LOGGED && $USER_DATA.access_level > 50}
        <a class="" href="{$SITE_URL}partner/edit/{$partner.id}">{l}EDIT{/l}</a>
    {/if}
    </div>
    <div class="b-section-wrap layout w976px b-idea">
        <aside class="b-section-aside">
            <h3 class="b-section-h3">{l}PARTNERS_COMPANY_URL{/l}:</h3>
            <div class="mB20px"><a target="_blank" href="{$partner.url}">{$partner.url}</a></div>
        </aside>
        <div class="b-section-body b-section-body__withAside">

            <div class="b-idea-item">
                <div class="b-idea-item-iname">{$partner.iname}</div>
            {if $partner.youtube_code}
                <iframe width="644" height="483" src="http://www.youtube.com/embed/{$partner.youtube_code}" frameborder="0" allowfullscreen></iframe>
                {elseif $partner.avatar_b}
                <img src="/{$partner.avatar_b}" alt="">
            {/if}

                <div class="b-idea-item-idesc js-tcMore">{$partner.idesc|tcMore}</div>
            </div>
        </div>
    </div>
</section>