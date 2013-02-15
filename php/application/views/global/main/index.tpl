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
            <a class="b-section-header-filters-item active" href="#">НОВІ ЗАВАНТАЖЕННЯ<div class="accent"></div></a>
            <a class="b-section-header-filters-item" href="#">НАЙПОПУЛЯРНІШІ<div class="accent"></div></a>
            <a class="b-section-header-filters-item" href="#">ПРИКЛАДИ<div class="accent"></div></a>
        </div>
    </div>
    <div class="b-section-body b-ideas layout w1010px">
        {foreach from=$ideas item=item}
        <div class="b-ideas-item">
            <a class="b-ideas-item-img" style="background-image: url({$item.youtube_img});">
                <div class="b-ideas-item-play"></div>
            </a>
            <a class="b-ideas-item-iname">{$item.iname}</a>
            <time class="b-ideas-item-time">10 минут тому</time>
            <a class="b-ideas-item-vote">
                ПІДТРИМУЙ!
            </a>
            <div class="tCenter">
                <div class="b-ideas-item-rating">Судьи: <div class="b-ideas-item-ratingStars s1"></div></div>
            </div>
        </div>
        {/foreach}
    </div>
</section>