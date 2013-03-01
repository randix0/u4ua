<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 13:12:01
         compiled from "application/views/global/main/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1702992572512f1118857723-23894538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c19b3df9eda8914256d39f552382a4964374dab' => 
    array (
      0 => 'application/views/global/main/index.tpl',
      1 => 1362049919,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1702992572512f1118857723-23894538',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512f1118873575_50198792',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512f1118873575_50198792')) {function content_512f1118873575_50198792($_smarty_tpl) {?><section class="b-section b-section-ideas">

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
        <?php echo $_smarty_tpl->getSubTemplate ("global/idea/items/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
</script><?php }} ?>