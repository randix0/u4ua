<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 14:47:31
         compiled from "application/views/global/idea/items/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:670203501512f1118879d90-02858308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '417456a3d007814d22f7ad2134be6b0d0d63a578' => 
    array (
      0 => 'application/views/global/idea/items/index.tpl',
      1 => 1362055371,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '670203501512f1118879d90-02858308',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512f11188bcdb4_61575145',
  'variables' => 
  array (
    'ideas' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512f11188bcdb4_61575145')) {function content_512f11188bcdb4_61575145($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ideas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<div class="b-ideas-item">
    <a class="b-ideas-item-img" href="/idea/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['item']->value['youtube_img'];?>
);">
        <div class="b-ideas-item-play"></div>
    </a>
    <a class="b-ideas-item-iname" href="/idea/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['iname'];?>
</a>
    <time class="b-ideas-item-time"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['actionTime'][0][0]->smartyActionTime($_smarty_tpl->tpl_vars['item']->value['add_date']);?>
</time>
    <a class="b-ideas-item-vote" onclick="U4ua.idea.vote(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);">
        ПІДТРИМУЙ!
    </a>
    <div class="tCenter">
        <div class="b-ideas-item-rating">Судьи: <div class="b-ideas-item-ratingStars s1"></div></div>
    </div>
</div>
<?php } ?><?php }} ?>