<section class="b-section b-section-idea">
    <div class="b-section-header layout w976px">
        <div class="b-section-header-iname">{l}PARTNERS_ADD_PARTNER{/l}</div>
    </div>
    <div class="b-section-body layout w976px mB25px">
        <form id="ajaxSavePartner" action="/ajax/savepartner" method="post">
            <input type="hidden" name="id" value="{$partner.id}" />
            <input type="hidden" id="partner_avatar_store_name" name="file[store_name]" value="" />
            <input type="hidden" id="partner_avatar_upload_path" name="file[upload_path]" value="" />


            <div class="mB10px overhide">
                <a id="partner_avatar_preview" class="b-chAvatar b-chAvatar__w216_h184 b-chAvatar__m5RB20 left" style="{if $partner.avatar_m}background-image: url(/{$partner.avatar_m});{/if}" onclick="Window.load('/modal/upload/partners/-1/-1','win-upload','');"></a>
                <div class="overhide">
                    <h3 class="b-section-h3">{l}PARTNERS_ADD_VIDEO_OR_PHOTO{/l}:</h3>
                    <h4 class="b-section-h4">{l}PARTNERS_ADD_VIDEO_LINK{/l}:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[link]" value="{if $partner.youtube_code}http://www.youtube.com/watch?v={$partner.youtube_code}{/if}" placeholder="http://www.youtube.com/watch?v=YOUTUBE_CODE"></div>
                </div>
            </div>

            <h3 class="b-section-h3">{l}PARTNERS_COMPANY_INAME{/l}:</h3>
            <div class="in-text mB25px"><input type="text"  name="item[iname]" value="{$partner.iname}"></div>
            <h3 class="b-section-h3">{l}PARTNERS_COMPANY_URL{/l}:</h3>
            <div class="in-text mB25px"><input type="text"  name="item[url]" placeholder="http://your_company_url.com" value="{$partner.url}"></div>

            <h3 class="b-section-h3">{l}PARTNERS_IDESC{/l}:</h3>
            <div class="in-textarea h100px mB25px"><textarea  name="item[idesc]">{$partner.idesc}</textarea></div>
        </form>

    {if $partner.id}
        <a class="button" onclick="Partner.save();">{l}SAVE{/l}</a>
        <a class="button button_cancel" href="{$SITE_URL}idea/{$partner.id}">{l}CANCEL{/l}</a>
        {else}
        <a class="button button_big" onclick="Partner.save();">{l}ADD{/l}</a>
    {/if}
    </div>



</section>

<script type="text/javascript">
    {literal}
    Partner = {
        save: function(){
            $.ajax({
                url: '/ajax/savePartner',
                type: 'POST',
                data: $('#ajaxSavePartner').serialize(),
                dataType: 'json',
                success: function(data){
                    if (data.status == 'success'){
                        console.log('Idea.save: success!');
                        if (data.goto)
                            window.location = data.goto;
                    } else {
                        console.log('Idea.save: error!');
                    }
                }
            });
        }
    };
    {/literal}
</script>