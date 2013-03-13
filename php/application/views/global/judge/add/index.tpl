<section class="b-section b-section-idea">
    <div class="b-section-header layout w976px">
        <div class="b-section-header-iname">{l}JUDGES_ADD_JUDGE{/l}</div>
    </div>
    <div class="b-section-body layout w976px mB25px">
        <form id="ajaxSaveJudge" action="/ajax/saveJudge" method="post">
            <input type="hidden" name="id" value="{$judge.id}" />
            <input type="hidden" id="judge_avatar_store_name" name="file[store_name]" value="" />
            <input type="hidden" id="judge_avatar_upload_path" name="file[upload_path]" value="" />


            <div class="mB10px overhide">
                <a id="judge_avatar_preview" class="b-chAvatar b-chAvatar__w216_h184 b-chAvatar__m5RB20 left" style="{if $judge.avatar_m}background-image: url(/{$judge.avatar_m});{/if}" onclick="Window.load('{$SITE_URI}modal/upload/judges/-1/-1','win-upload','');"></a>
                <div class="overhide">
                    <h3 class="b-section-h3">{l}JUDGES_ADD_VIDEO_OR_PHOTO{/l}:</h3>
                    <h4 class="b-section-h4">{l}JUDGES_ADD_VIDEO_LINK{/l}:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[link]" value="{if $judge.youtube_code}http://www.youtube.com/watch?v={$judge.youtube_code}{/if}" placeholder="http://www.youtube.com/watch?v=YOUTUBE_CODE"></div>
                </div>
            </div>

            <h3 class="b-section-h3">{l}JUDGES_FIRST_NAME{/l}:</h3>
            <div class="in-text mB25px"><input type="text"  name="item[first_name]" value="{$judge.first_name}"></div>
            <h3 class="b-section-h3">{l}JUDGES_LAST_NAME{/l}:</h3>
            <div class="in-text mB25px"><input type="text"  name="item[last_name]" value="{$judge.last_name}"></div>
            <h3 class="b-section-h3">{l}JUDGES_COMPANY_URL{/l}:</h3>
            <div class="in-text mB25px"><input type="text"  name="item[company_url]" placeholder="http://your_company_url.com" value="{$judge.company_url}"></div>
            <h3 class="b-section-h3">{l}JUDGES_COMPANY_INAME{/l}:</h3>
            <div class="in-text mB25px"><input type="text"  name="item[company_iname]" value="{$judge.company_iname}"></div>
            <h3 class="b-section-h3">{l}JUDGES_ROLE{/l}:</h3>
            <div class="in-text mB25px"><input type="text"  name="item[role]" value="{$judge.role}"></div>
            <h3 class="b-section-h3">{l}JUDGES_POST_INAME{/l}:</h3>
            <div class="in-text mB25px"><input type="text"  name="item[iname]" value="{$judge.iname}"></div>
            <h3 class="b-section-h3">{l}JUDGES_POST_IDESC{/l}:</h3>
            <div class="in-textarea h100px mB25px"><textarea  name="item[idesc]">{$judge.idesc}</textarea></div>
        </form>
    {*
        <div class="mB25px">
            <a class="button" onclick="Idea.save();">Добавить</a>
            <a class="button button_cancel" href="">Отменить</a>
        </div>
    *}
    {if $judge.id}
        <a class="button" onclick="Judge.save();">{l}SAVE{/l}</a>
        <a class="button button_cancel" href="{$SITE_URL}idea/{$judge.id}">{l}CANCEL{/l}</a>
        {else}
        <a class="button button_big" onclick="Judge.save();">{l}ADD{/l}</a>
    {/if}
    </div>



</section>

<script type="text/javascript">
    {literal}
    Judge = {
        save: function(){
            $.ajax({
                url: '/ajax/saveJudge',
                type: 'POST',
                data: $('#ajaxSaveJudge').serialize(),
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