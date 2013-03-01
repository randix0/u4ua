<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 13:01:52
         compiled from "application/views/global/idea/item/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:737220333512f11b0d408a6-08364314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3611162b20fd826865732d4ead5f64e72a526fa' => 
    array (
      0 => 'application/views/global/idea/item/index.tpl',
      1 => 1362049309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '737220333512f11b0d408a6-08364314',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512f11b0d441a7_90667952',
  'variables' => 
  array (
    'idea' => 0,
    'comments' => 0,
    'LOGGED' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512f11b0d441a7_90667952')) {function content_512f11b0d441a7_90667952($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/www/u4ua.lo/www/application/libraries/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/www/u4ua.lo/www/application/libraries/smarty/plugins/modifier.date_format.php';
?><section class="b-section b-section-idea">
    <?php if ($_smarty_tpl->tpl_vars['idea']->value['is_can_edit']){?>
        <div class="b-section-header layout w976px">
            <div class="b-section-header-iname">Управление идеей</div>
        </div>
    <?php }?>
    <div class="b-section-wrap layout w976px b-idea">
        <aside class="b-section-aside">
            <h3 class="b-section-h3">Qr-код:</h3>
            <img class="b-idea-qr" src="<?php echo $_smarty_tpl->tpl_vars['idea']->value['qr_code'];?>
" />
            <h3 class="b-section-h3"><?php if ($_smarty_tpl->tpl_vars['idea']->value['is_author']){?>твоя <?php }?>листовка:</h3>
            <a class="b-idea-getPdf">Скачать</a>
            <?php if ($_smarty_tpl->tpl_vars['idea']->value['is_can_edit']){?>
                <div class="b-idea-putFile">
                    <div class="b-idea-putFile-desc">Перетяни сюда файл</div>
                    <a class="b-idea-putFile-choose">Выбрать вручную</a>
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['idea']->value['team']){?>
                <h3 class="b-section-h3">Команда:</h3>
                <?php if ($_smarty_tpl->tpl_vars['idea']->value['is_can_edit']){?>
                    <a class="b-idea-addPerson" href="">Добавить участника</a>
                <?php }?>
            <?php }?>
            <h3 class="b-section-h3">Расскажи всем:</h3>
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
            <h3 class="b-section-h3">Твоя идея:</h3>
            <div class="b-idea-notice">
                <a class="close" href=""></a>
                <div class="b-idea-notice-content p37pxi">
                    ТОЛЬКО ОТ ТЕБЯ ЗАВИСИТ УСПЕХ ТВОЕЙ ИДЕИИ!<br/>
                    ИСПОЛЬЗУЙ ВСЕ СРЕДСТВА ДЛЯ ЕЕ ПРОДВИЖЕНИЯ!
                </div>
            </div>

            <div class="b-idea-item">
                <div class="b-idea-item-iname"><?php echo $_smarty_tpl->tpl_vars['idea']->value['iname'];?>
</div>
                <iframe width="644" height="483" src="http://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['idea']->value['youtube_code'];?>
" frameborder="0" allowfullscreen></iframe>
                <div class="b-idea-item-stripe">
                    <div class="b-idea-item-rating right">Судьи: <div class="b-idea-item-ratingStars s<?php echo $_smarty_tpl->tpl_vars['idea']->value['rating_judges'];?>
"></div></div>
                    Поддержало: <?php echo $_smarty_tpl->tpl_vars['idea']->value['rating'];?>

                </div>
                <div class="b-idea-item-idesc">
                    <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['idea']->value['idesc'],255);?>

                </div>

                <div class="mB20px">
                    <a class="b-showMore" href="">Показать больше</a>
                </div>

                <?php if ($_smarty_tpl->tpl_vars['idea']->value['comments_count']<10){?>
                <div class="b-idea-notice">
                    <a class="close" href=""></a>
                    <div class="b-idea-notice-content">
                        ТОЛЬКО ИДЕИ С МИНИМУМ 10 КОММЕНТАРИЕВ<br>
                        БУДУТ ОЦЕНЕНЫ МЕНТОРАМИ
                    </div>
                </div>
                <?php }?>

                <div class="b-comments">
                    <div class="b-comments-header">Комментарии (<span class="b-comments-number"><?php echo $_smarty_tpl->tpl_vars['idea']->value['comments_count'];?>
</span>)</div>
                    <div class="b-comments-body">
                        <?php if ($_smarty_tpl->tpl_vars['idea']->value['comments_count']&&$_smarty_tpl->tpl_vars['idea']->value['comments']){?>
                            <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['idea']->value['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
                                <div class="b-comments-item">
                                    <a class="b-comments-item-avatar" href="" style="background-image: none;"></a>
                                    <div class="b-comments-item-wrap">
                                        <a class="b-comments-item-iname" href="">Владимир Бабичев</a>
                                        <time class="b-comments-item-time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comments']->value['add_date'],"%d/%m/%Y %H:%I");?>
</time>
                                        <div class="b-comments-item-idesc"><?php echo $_smarty_tpl->tpl_vars['comments']->value['idesc'];?>
</div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php }?>
                    </div>
                    <div class="b-comments-footer">
                        <?php if ($_smarty_tpl->tpl_vars['LOGGED']->value){?>
                            <div class="mB20px">
                                <form method="post">
                                    <h4 class="b-section-h4">Add comment</h4>
                                    <div class="in-textarea mB10px"><textarea name="item[idesc]"></textarea></div>
                                    <div class="tRight">
                                        <a class="button" onclick="">Add</a>
                                    </div>
                                </form>
                            </div>
                        <?php }?>
                        <a class="b-comments-more" href="">Еще комментарии</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php }} ?>