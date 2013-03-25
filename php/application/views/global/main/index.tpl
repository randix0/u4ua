<section class="b-section b-section-ideas">

    <div id="how_to_take_part" class="b-notice b-notice__size_small layout w1014px mB80pxi">
        <div class="b-notice-content">
            <a class="close" onclick="$('#how_to_take_part').hide();"></a>
            <h3 class="b-section-h3">{l}MAIN_TAKE_PART_S0{/l}</h3>
            <div class="b-rules-steps">
                <div class="b-rules-step step0">
                    <div class="b-rules-step-img"></div>
                    <div class="b-rules-step-wrap">
                        <div class="b-rules-step-number">1</div>
                        <div class="b-rules-step-idesc">{l}MAIN_TAKE_PART_S1{/l} <br> «<a {if $LOGGED}href="{$SITE_URL}idea/add/"{else}onclick="Window.load('{$SITE_URL}modal/login','win-login','');"{/if}>{l}HEADER_SHARE_YOUR_IDEA{/l}</a>»</div>
                    </div>
                </div>
                <div class="b-rules-step step1">
                    <div class="b-rules-step-img"></div>
                    <div class="b-rules-step-wrap">
                        <div class="b-rules-step-number">2</div>
                        <div class="b-rules-step-idesc">{l}MAIN_TAKE_PART_S2{/l}</div>
                    </div>
                </div>
                <div class="b-rules-step step2">
                    <div class="b-rules-step-img"></div>
                    <div class="b-rules-step-wrap">
                        <div class="b-rules-step-number">3</div>
                        <div class="b-rules-step-idesc">{l}MAIN_TAKE_PART_S3{/l}</div>
                    </div>
                </div>
                <div class="b-rules-step step3">
                    <div class="b-rules-step-img"></div>
                    <div class="b-rules-step-wrap">
                        <div class="b-rules-step-number">4</div>
                        <div class="b-rules-step-idesc">{l}MAIN_TAKE_PART_S4{/l}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="b-section-header layout w976px">
        <div class="b-section-header-iname">{l}MAIN_FILTER_CAPTION{/l}</div>
        <div class="b-section-header-filters">
            <a class="b-section-header-filters-item {if isset($order_by) && $order_by == 'date'}active disabled{/if}" href="{$SITE_URL}ideas/date">{l}MAIN_FILTER_DATE{/l}<div class="accent"></div></a>
            <a class="b-section-header-filters-item {if isset($order_by) && $order_by == 'rating'}active disabled{/if}" href="{$SITE_URL}ideas/rating">{l}MAIN_FILTER_RATING{/l}<div class="accent"></div></a>
            {if $LOGGED && $USER_DATA.is_judge}
                <a class="b-section-header-filters-item {if isset($order_by) && $order_by == 'judging'}active disabled{/if}" href="{$SITE_URL}ideas/judging">{l}MAIN_FILTER_JUDGING{/l}<div class="accent"></div></a>
            {else}
                <a class="b-section-header-filters-item {if isset($order_by) && $order_by == 'samples'}active disabled{/if}" href="{$SITE_URL}ideas/samples">{l}MAIN_FILTER_SAMPLES{/l}<div class="accent"></div></a>
            {/if}
        </div>
    </div>
    <div id="b-ideas" class="b-section-body b-ideas {if $order_by}b-ideas__{$order_by}{/if} layout w1010px">
        {if isset($order_by) && $order_by == 'judging'}
            {include file="global/idea/items/judging.tpl"}
        {else}
            {include file="global/idea/items/index.tpl"}
        {/if}
    </div>
    <div class="b-section-footer layout w1010px tCenter"></div>
</section>


<script type="text/javascript">
    $(document).ready(function(){
        $('.b-ideas').masonry({
            itemSelector: '.b-ideas-item',
            singleMode: true,
            isResizable: false
        });
    });

    onScrollLoader.init('/ajax/getIdeas/{if isset($order_by) && $order_by == 'rating'}rating{elseif isset($order_by) && $order_by == 'judging'}judging{elseif isset($order_by) && $order_by == 'samples'}samples{else}date{/if}/', '.b-ideas .b-ideas-item', function(){ $('.b-ideas').masonry('reload'); U4ua.idea.binder();});

    U4ua.idea.filter = '{if isset($order_by) && $order_by == 'judging'}judging{elseif isset($order_by) && $order_by == 'samples'}samples{else}main{/if}';
    U4ua.idea.order_by = '{if isset($order_by) && $order_by == 'rating'}rating{else}date{/if}';

    U4ua.idea.binder();

    Ideas = {
        more: function(){
            $.ajax({
                url: '/ajax/getIdeas',
                type: 'POST',
                dataType: 'json',
                success: function(data){
                    if (data.status == 'success'){
                        $('.b-ideas').append(data.html).masonry('reload');
                    } else {
                        console.log('Idea.save: error!');
                    }
                }
            });
        }
    };
</script>