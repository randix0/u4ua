<section class="b-section b-section-ideas">

    <div id="how_to_take_part" class="b-notice b-notice__size_small layout w1014px mB80pxi">
        <div class="b-notice-content">
            <a class="close" onclick="$('#how_to_take_part').hide();"></a>
            <h3 class="b-section-h3">ВЗЯТИ УЧАСТЬ - ПРОСТО</h3>
            <div class="b-rules-steps">
                <div class="b-rules-step step0">
                    <div class="b-rules-step-img"></div>
                    <div class="b-rules-step-wrap">
                        <div class="b-rules-step-number">1</div>
                        <div class="b-rules-step-idesc">Тисні на <br> «<a href="/idea/add/">Поділись своєю ідеєю</a>»</div>
                    </div>
                </div>
                <div class="b-rules-step step1">
                    <div class="b-rules-step-img"></div>
                    <div class="b-rules-step-wrap">
                        <div class="b-rules-step-number">2</div>
                        <div class="b-rules-step-idesc">Завантажуй відео-пітч <br> (лише англійською)</div>
                    </div>
                </div>
                <div class="b-rules-step step2">
                    <div class="b-rules-step-img"></div>
                    <div class="b-rules-step-wrap">
                        <div class="b-rules-step-number">3</div>
                        <div class="b-rules-step-idesc">Отримуй відгуки, коментарі, бали журі у першому етапі</div>
                    </div>
                </div>
                <div class="b-rules-step step3">
                    <div class="b-rules-step-img"></div>
                    <div class="b-rules-step-wrap">
                        <div class="b-rules-step-number">4</div>
                        <div class="b-rules-step-idesc">Створи прототип для другого етапу та виграй головний приз</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="b-section-header layout w976px">
        <div class="b-section-header-iname">ОСТАННІ ІДЕЇ</div>
        <div class="b-section-header-filters">
            <a class="b-section-header-filters-item {if isset($order_by) && $order_by == 'date'}active disabled{/if}" href="/ideas/date">НОВІ ЗАВАНТАЖЕННЯ<div class="accent"></div></a>
            <a class="b-section-header-filters-item {if isset($order_by) && $order_by == 'rating'}active disabled{/if}" href="/ideas/rating">НАЙПОПУЛЯРНІШІ<div class="accent"></div></a>
            {if $LOGGED && $USER_DATA.is_judge}
                <a class="b-section-header-filters-item {if isset($order_by) && $order_by == 'judging'}active disabled{/if}" href="/ideas/judging">для суддів<div class="accent"></div></a>
            {else}
                <a class="b-section-header-filters-item {if isset($order_by) && $order_by == 'samples'}active disabled{/if}" href="/ideas/samples">ПРИКЛАДИ<div class="accent"></div></a>
            {/if}
        </div>
    </div>
    <div class="b-section-body b-ideas layout w1010px">
        {include file="global/idea/items/index.tpl"}
    </div>
    <div class="b-section-footer layout w1010px tCenter">
        <a class="button block" onclick="Ideas.more();">More</a>
    </div>
</section>


<script type="text/javascript">
    $(document).ready(function(){
        $('.b-ideas').masonry({
            itemSelector: '.b-ideas-item',
            singleMode: true,
            isResizable: false
            //isAnimated: !Modernizr.csstransitions
        });
    });

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
/*
    var count = 0;
    $(window).scroll(function(){

        if  ($(window).scrollTop() == ($(document).height() - $(window).height())){
            Ideas.more();
            count++;
            console.log('count='+count);
        }
    });
*/
</script>