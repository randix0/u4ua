<section class="b-section b-section-idea">
    {if $idea.is_can_edit}
        <div class="b-section-header layout w976px">
            <div class="b-section-header-iname">{l}IDEA_MANAGE{/l}</div>
            <a class="" href="{$SITE_URL}idea/edit/{$idea.id}">{l}EDIT{/l}</a>
        </div>
    {/if}
    <div class="b-section-wrap layout w976px b-idea">
        <aside class="b-section-aside">
            <h3 class="b-section-h3">{l}IDEA_QR{/l}:</h3>
            <img class="b-idea-qr" src="{$idea.qr_code}" />
            {if $idea.attachments || $idea.is_can_edit}
                <h3 class="b-section-h3">{l}IDEA_ATTACHMENTS{/l}:</h3>
                <div id="idea_attachments" class="">
                    {include file="global/idea/attachments/index.tpl" attachments=$idea.attachments}
                </div>
                {if $idea.is_can_edit}
                    <div class="left w210px mR10px">
                        <div class="b-idea-putFile">
                            <div class="b-idea-putFile-desc">{l}FILE_UPLOAD{/l}</div>
                            <a class="b-idea-putFile-choose" onclick="Window.load('/modal/upload/attachments/{$idea.id}','win-upload','');">{l}FILE_CHOOSE{/l}</a>
                        </div>
                    </div>
                {/if}
            {/if}

            {if $idea.team || $idea.is_can_edit}
                <h3 class="b-section-h3">{l}IDEA_TEAM{/l}:</h3>
                <div id="idea_team" class="overhide">
                    {include file="global/idea/team/index.tpl" team=$idea.team}
                </div>
                {if $idea.is_can_edit}
                    <a class="b-idea-addPerson" onclick="Window.load('/modal/upload/team/{$idea.id}','win-upload','');">{l}IDEA_TEAM_ADD{/l}</a>
                {/if}
            {/if}
            <h3 class="b-section-h3">{l}IDEA_SHARE{/l}:</h3>
            <div class="b-idea-share">
                <a class="b-idea-share-btn email right" href=""></a>
                <div class="b-idea-share-soc">
                    <a class="b-idea-share-btn fb mB20px left" href=""></a>
                    <a class="b-idea-share-btn vk mB20px left" href=""></a>
                    <a class="b-idea-share-btn tw mB20px left" href=""></a>
                </div>
            </div>
        </aside>
        <div class="b-section-body b-section-body__withAside">
            {if $idea.is_author && !$idea.is_sample}
                <h3 class="b-section-h3">{l}IDEA_YOUR{/l}:</h3>
                <div class="b-idea-notice">
                    <a class="close" onclick="$(this).parent().hide();"></a>
                    <div class="b-idea-notice-content p37pxi">{l}IDEA_NOTICE_1{/l}</div>
                </div>
            {elseif $idea.is_sample}
                <div class="b-idea-notice">
                    <a class="close" href=""></a>
                    <div class="b-idea-notice-content p37pxi">{l}IDEAS_SAMPLE{/l}</div>
                </div>
            {/if}
            <div class="b-idea-item">
                <div class="b-idea-item-iname">{$idea.iname}</div>
                <iframe width="644" height="483" src="http://www.youtube.com/embed/{$idea.youtube_code}" frameborder="0" allowfullscreen></iframe>
                <div class="b-idea-item-stripe">
                    <div class="b-idea-item-rating right">{l}IDEAS_JUDGES{/l}: <div class="b-idea-item-ratingStars s{$idea.rating_stars}"></div></div>
                    {l}IDEAS_SUPPORTED{/l}: {$idea.rating}
                </div>
                <div class="b-idea-item-idesc js-tcMore">
                    {$idea.idesc|tcMore}
                </div>

                {if $idea.comments_count < 10}
                <div class="b-idea-notice">
                    <a class="close" onclick="$(this).parent().hide();"></a>
                    <div class="b-idea-notice-content">{l}IDEA_NOTICE_2{/l}</div>
                </div>
                {/if}

                <div class="b-comments">
                    <div class="b-comments-header">{l}IDEAS_COMMENTS{/l} (<span id="comments-number" class="b-comments-number">{$idea.comments_count}</span>)</div>
                    {if $idea.comments_count > 5}
                        <a class="b-comments-more" onclick="$('#comments_hidden').show(); $(this).hide();">{l}IDEA_COMMENTS_SHOW_ALL_p1{/l} {$idea.comments_count} {l}IDEA_COMMENTS_SHOW_ALL_p2{/l}</a>
                    {/if}
                    <div class="b-comments-body" id="idea_comments">
                        {if $idea.comments_count && $idea.comments}
                            {include file="global/idea/comments/index.tpl" comments = $idea.comments limit = 5}
                        {/if}
                    </div>
                    <div class="b-comments-footer">
                        {if $LOGGED}
                            <div class="mB20px">
                                <form method="post" id="ajaxSaveComment">
                                    <h4 class="b-section-h4">Add comment</h4>
                                    <input type="hidden" name="item[idea_id]" value="{$idea.id}">
                                    <div class="in-textarea mB10px"><textarea name="item[idesc]"></textarea></div>
                                    <div class="tRight">
                                        <a class="button" onclick="Comment.add();">{l}ADD{/l}</a>
                                    </div>
                                </form>
                                <script type="text/javascript">
                                    Comment = {
                                        count: -1,
                                        add: function(){
                                            $.ajax({
                                                url: '/ajax/saveComment',
                                                type: 'POST',
                                                data: $('#ajaxSaveComment').serialize(),
                                                dataType: 'json',
                                                success: function(data){
                                                    if (data.status == 'success' && data.html){
                                                        $('#idea_comments').append(data.html);
                                                        if (Comment.count < 0) {
                                                            Comment.count = parseInt($('#comments-number').html());
                                                        }
                                                        Comment.count++;
                                                        $('#comments-number').html(Comment.count);
                                                        $('#ajaxSaveComment textarea').val('');
                                                    } else {
                                                        console.log('Idea.save: error!');
                                                    }
                                                }
                                            });
                                        }
                                    };
                                </script>
                            </div>
                        {else}
                            <div class="mB20px">
                                {l}IDEA_COMMENT_NOT_LOGGED_p1{/l} <a onclick="Window.load(SITE_URI+'modal/login','win-login','');">{l}HEADER_LOGIN{/l}</a>{l}IDEA_COMMENT_NOT_LOGGED_p2{/l}
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>