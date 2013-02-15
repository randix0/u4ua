<?php /* Smarty version Smarty-3.1.13, created on 2013-02-15 18:52:58
         compiled from "application/views/global/main/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1922241099511cdd39470544-01713361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c19b3df9eda8914256d39f552382a4964374dab' => 
    array (
      0 => 'application/views/global/main/index.tpl',
      1 => 1360947176,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1922241099511cdd39470544-01713361',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_511cdd394cb016_27666117',
  'variables' => 
  array (
    'ideas' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511cdd394cb016_27666117')) {function content_511cdd394cb016_27666117($_smarty_tpl) {?><section class="b-section b-section-ideas">

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
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ideas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <div class="b-ideas-item">
            <a class="b-ideas-item-img" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['item']->value['youtube_img'];?>
);">
                <div class="b-ideas-item-play"></div>
            </a>
            <a class="b-ideas-item-iname"><?php echo $_smarty_tpl->tpl_vars['item']->value['iname'];?>
</a>
            <time class="b-ideas-item-time">10 минут тому</time>
            <a class="b-ideas-item-vote">
                ПІДТРИМУЙ!
            </a>
            <div class="tCenter">
                <div class="b-ideas-item-rating">Судьи: <div class="b-ideas-item-ratingStars s1"></div></div>
            </div>
        </div>
        <?php } ?>
    </div>
</section><?php }} ?>