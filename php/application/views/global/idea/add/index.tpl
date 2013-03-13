<section class="b-section b-section-idea">
    <div class="b-section-header layout w976px">
        <div class="b-section-header-iname">{l}HEADER_SHARE_YOUR_IDEA{/l}</div>
    </div>
    <div class="b-section-body layout w976px mB25px">
        <form id="ajaxSaveIdea" action="/ajax/saveIdea" method="post">
            <input type="hidden" name="id" value="{$idea.id}" />
            <h3 class="b-section-h3">{l}ADD_IDEA_ADD_VIDEO{/l}:</h3>
            <h4 class="b-section-h4">{l}ADD_IDEA_VIDEO_LINK{/l}:</h4>
            <div class="in-text mB25px"><input type="text" name="item[link]" value="{if $idea.youtube_code}http://www.youtube.com/watch?v={$idea.youtube_code}{/if}" placeholder="http://www.youtube.com/watch?v=YOUTUBE_CODE"></div>
            <h3 class="b-section-h3">{l}ADD_IDEA_INAME{/l}:</h3>
            <div class="in-text mB25px"><input type="text"  name="item[iname]" value="{$idea.iname}"></div>
            <h3 class="b-section-h3">{l}ADD_IDEA_IDESC{/l}:</h3>
            <div class="in-textarea h100px mB25px"><textarea  name="item[idesc]">{$idea.idesc}</textarea></div>
            <h3 class="b-section-h3">{l}ADD_IDEA_CONTACTS{/l}:</h3>
            <div class="overhide mLRn5px">
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">{l}ADD_IDEA_CONTACT_FIRST_NAME{/l}:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[contact_first_name]" value="{if $idea.contact_first_name}{$idea.contact_first_name}{else}{$USER_DATA.first_name}{/if}"></div>
                </div>
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">{l}ADD_IDEA_CONTACT_LAST_NAME{/l}:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[contact_last_name]" value="{if $idea.contact_last_name}{$idea.contact_last_name}{else}{$USER_DATA.last_name}{/if}"></div>
                </div>
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">{l}ADD_IDEA_CONTACT_ROLE{/l}:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[contact_role]" placeholder="Leader" value="{if $idea.contact_role}{$idea.contact_role}{else}Leader{/if}"></div>
                </div>
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">{l}ADD_IDEA_CONTACT_EMAIL{/l}:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[contact_email]" value="{if $idea.contact_email}{$idea.contact_email}{else}{$USER_DATA.email}{/if}"></div>
                </div>
                <div class="left w236px mLR5px">
                    <h4 class="b-section-h4">{l}ADD_IDEA_CONTACT_PHONE{/l}:</h4>
                    <div class="in-text mB25px"><input type="text" name="item[contact_phone]" placeholder="+380" value="{$idea.contact_phone}"></div>
                </div>
            </div>
            {if isset($USER_DATA) && $USER_DATA && isset($USER_DATA.access_level) && $USER_DATA.access_level > 50}
                <div class="in-checkbox mB25px">
                    <label class="button button_cancel"><input type="checkbox" {if $idea.is_sample}checked="checked"{/if} name="item[is_sample]" value="1" /> {l}ADD_IDEA_IS_SAMPLE{/l}</label>
                </div>
            {/if}

        </form>
    {if $idea.id}
        <h3 class="b-section-h3">{l}IDEA_ATTACHMENTS{/l}:</h3>
        <div class="overhide">
            <div id="idea_attachments" class="inline">
                {include file="global/idea/attachments/index.tpl" attachments=$idea.attachments}
            </div>

            <div class="left w210px mR10px">
                <div class="b-idea-putFile">
                    <div class="b-idea-putFile-desc">{l}FILE_UPLOAD{/l}</div>
                    <a class="b-idea-putFile-choose" onclick="Window.load('{$SITE_URI}modal/upload/attachments/{$idea.id}','win-upload','');">{l}FILE_CHOOSE{/l}</a>
                </div>
            </div>
        </div>
        <h3 class="b-section-h3">{l}IDEA_TEAM{/l}:</h3>
        <div class="b-idea-team">
            <div id="idea_team" class="inline">
                {include file="global/idea/team/index.tpl" team=$idea.team}
            </div>
            <a class="b-idea-addPerson left" onclick="Window.load('{$SITE_URI}modal/upload/team/{$idea.id}','win-upload','');">{l}IDEA_TEAM_ADD{/l}</a>
        </div>
    {/if}

        {if $idea.id}
            <a class="button" onclick="Idea.save();">{l}SAVE{/l}</a>
            <a class="button button_cancel" href="{$SITE_URL}idea/{$idea.id}">{l}CANCEL{/l}</a>
        {else}
            <a class="button button_big" onclick="Idea.save();">{l}IDEA_SAVE{/l}</a>
        {/if}
    </div>



</section>

<script type="text/javascript">
    {literal}
        Idea = {
            save: function(){
                $.ajax({
                    url: '/ajax/saveIdea',
                    type: 'POST',
                    data: $('#ajaxSaveIdea').serialize(),
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