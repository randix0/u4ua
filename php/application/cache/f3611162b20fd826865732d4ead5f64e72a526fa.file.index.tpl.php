<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 10:46:24
         compiled from "application/views/global/idea/item/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1158192691512f1960051739-88746693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3611162b20fd826865732d4ead5f64e72a526fa' => 
    array (
      0 => 'application/views/global/idea/item/index.tpl',
      1 => 1362040082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1158192691512f1960051739-88746693',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idea' => 0,
    'comments' => 0,
    'LOGGED' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512f1960186e85_05531806',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512f1960186e85_05531806')) {function content_512f1960186e85_05531806($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/www/u4ua.lo/www/application/libraries/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/www/u4ua.lo/www/application/libraries/smarty/plugins/modifier.date_format.php';
?><section class="b-section b-section-idea">
    <?php if ($_smarty_tpl->tpl_vars['idea']->value['is_can_edit']){?>
        <div class="b-section-header layout w976px">
            <div class="b-section-header-iname">Управление идеей</div>
            <a class="" href="/idea/edit/<?php echo $_smarty_tpl->tpl_vars['idea']->value['id'];?>
">edit</a>
        </div>
    <?php }?>
    <div class="b-section-wrap layout w976px b-idea">
        <aside class="b-section-aside">
            <h3 class="b-section-h3">Qr-код:</h3>
            <img class="b-idea-qr" src="<?php echo $_smarty_tpl->tpl_vars['idea']->value['qr_code'];?>
" />
            <?php if ($_smarty_tpl->tpl_vars['idea']->value['attachments']||$_smarty_tpl->tpl_vars['idea']->value['is_can_edit']){?>
                <h3 class="b-section-h3"><?php if ($_smarty_tpl->tpl_vars['idea']->value['is_author']){?>твоя <?php }?>листовка:</h3>
                <div id="idea_attachments" class="">
                    <?php echo $_smarty_tpl->getSubTemplate ("global/idea/attachments/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('attachments'=>$_smarty_tpl->tpl_vars['idea']->value['attachments']), 0);?>

                </div>
                <?php if ($_smarty_tpl->tpl_vars['idea']->value['is_can_edit']){?>
                    <div class="left w210px mR10px">
                        <div class="b-idea-putFile">
                            <div class="b-idea-putFile-desc">Upload files</div>
                            <a class="b-idea-putFile-choose" onclick="Window.load('/modal/upload/attachments/<?php echo $_smarty_tpl->tpl_vars['idea']->value['id'];?>
','win-upload','');">Choose</a>
                        </div>
                    </div>
                <?php }?>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['idea']->value['team']||$_smarty_tpl->tpl_vars['idea']->value['is_can_edit']){?>
                <h3 class="b-section-h3">Команда:</h3>
                <div id="idea_team" class="overhide">
                    <?php echo $_smarty_tpl->getSubTemplate ("global/idea/team/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('team'=>$_smarty_tpl->tpl_vars['idea']->value['team']), 0);?>

                </div>
                <?php if ($_smarty_tpl->tpl_vars['idea']->value['is_can_edit']){?>
                    <a class="b-idea-addPerson" onclick="Window.load('/modal/upload/team/<?php echo $_smarty_tpl->tpl_vars['idea']->value['id'];?>
','win-upload','');">Добавить участника</a>
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