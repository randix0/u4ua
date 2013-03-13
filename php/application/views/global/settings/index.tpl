<section class="b-section b-section-ideas">
    <div class="b-section-header layout w976px">
        <div class="b-section-header-iname">{l}NAV_SETTINGS{/l}</div>
    </div>
    <div class="b-section-body b-ideas layout w1010px">
        {include file="global/settings/items.tpl"}
    </div>
    <div class="b-section-footer layout w1010px tCenter"></div>
</section>


<script type="text/javascript">
    $(document).ready(function(){
        $('.b-settings').masonry({
            itemSelector: '.b-settings-item',
            singleMode: true,
            isResizable: false
            //isAnimated: !Modernizr.csstransitions
        });
    });

    Settings = {
        save: function(code){
            $.ajax({
                url: '/ajax/saveSettings',
                type: 'POST',
                data: $('#settings_'+code).serialize(),
                dataType: 'json',
                beforeSend: function(){
                    $('#settings_'+code+' .button').removeClass('button_error').removeClass('button_success');
                },
                success: function(data){
                    if (data.status == 'success'){
                        console.log('Idea.save: success!');
                        $('#settings_'+code+' .button').addClass('button_success');
                        if (data.goto)
                            window.location = data.goto;
                    } else {
                        $('#settings_'+code+' .button').addClass('button_error');
                        console.log('Idea.save: error!');
                    }
                }
            });
        }
    };
</script>