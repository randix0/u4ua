<section class="b-section b-section-video">
    <div class="b-section-header layout w976px">
        <div class="b-section-header-iname">{l}VIDEOS_ADD_VIDEO{/l}</div>
    </div>
    <div class="b-section-body layout w976px mB25px">
        <form id="ajaxSaveVideo" action="/ajax/saveVideo" method="post">
            <input type="hidden" name="id" value="{$video.id}" />
            <h3 class="b-section-h3">{l}VIDEOS_ADD_YOUTUBE{/l}:</h3>
            <h4 class="b-section-h4">{l}VIDEOS_LINK{/l}:</h4>
            <div class="in-text mB25px"><input type="text" name="item[link]" value="{if $video.youtube_code}http://www.youtube.com/watch?v={$video.youtube_code}{/if}" placeholder="http://www.youtube.com/watch?v=YOUTUBE_CODE"></div>
            <h3 class="b-section-h3">{l}VIDEOS_INAME{/l}:</h3>
            <div class="in-text mB25px"><input type="text"  name="item[iname]" value="{$video.iname}"></div>
            <h3 class="b-section-h3">{l}VIDEOS_IDESC{/l}:</h3>
            <div class="in-textarea h100px mB25px"><textarea  name="item[idesc]">{$video.idesc}</textarea></div>
            <h3 class="b-section-h3">{l}VIDEOS_SIGN{/l}:</h3>
            <div class="in-text mB25px"><input type="text"  name="item[signature]" value="{$video.signature}"></div>
        </form>

    {if $video.id}
        <a class="button" onclick="Video.save();">{l}SAVE{/l}</a>
        <a class="button button_cancel" href="{$SITE_URL}video/{$video.id}">{l}CANCEL{/l}</a>
        {else}
        <a class="button button_big" onclick="Video.save();">{l}ADD{/l}</a>
    {/if}
    </div>



</section>

<script type="text/javascript">
    {literal}
    Video = {
        save: function(){
            $.ajax({
                url: '/ajax/saveVideo',
                type: 'POST',
                data: $('#ajaxSaveVideo').serialize(),
                dataType: 'json',
                success: function(data){
                    if (data.status == 'success'){
                        console.log('Video.save: success!');
                        if (data.goto)
                            window.location = data.goto;
                    } else {
                        console.log('Video.save: error!');
                    }
                }
            });
        }
    };
    {/literal}
</script>