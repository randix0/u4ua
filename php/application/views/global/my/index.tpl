<section class="b-section b-section-ideas">
    <div class="b-section-header layout w976px">
        <div class="b-section-header-iname">{l}IDEAS_YOUR{/l}</div>
    </div>
    <div class="b-section-body b-ideas layout w1010px">
        {include file="global/idea/items/my.tpl"}
    </div>
    <div class="b-section-footer layout w1010px tCenter"></div>
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
</script>