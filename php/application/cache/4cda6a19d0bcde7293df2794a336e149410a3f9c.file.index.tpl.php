<?php /* Smarty version Smarty-3.1.13, created on 2013-03-01 17:08:26
         compiled from "application/views/modals/login/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7786849155130c46a5bc7b3-19305892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4cda6a19d0bcde7293df2794a336e149410a3f9c' => 
    array (
      0 => 'application/views/modals/login/index.tpl',
      1 => 1361976209,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7786849155130c46a5bc7b3-19305892',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'reason' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5130c46a67da12_24472139',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5130c46a67da12_24472139')) {function content_5130c46a67da12_24472139($_smarty_tpl) {?><h3 class="b-section-h3">Sign-in with</h3>
<a class="b-idea-share-btn fb mR10px" onclick="Auth.facebook(<?php if (isset($_smarty_tpl->tpl_vars['reason']->value)&&$_smarty_tpl->tpl_vars['reason']->value){?>'<?php echo $_smarty_tpl->tpl_vars['reason']->value;?>
'<?php }?>);"></a>
<a class="b-idea-share-btn vk mR10px" onclick="Auth.vkontakte(<?php if (isset($_smarty_tpl->tpl_vars['reason']->value)&&$_smarty_tpl->tpl_vars['reason']->value){?>'<?php echo $_smarty_tpl->tpl_vars['reason']->value;?>
'<?php }?>);"></a>
<a class="b-idea-share-btn gp mR10px" onclick="Auth.google(<?php if (isset($_smarty_tpl->tpl_vars['reason']->value)&&$_smarty_tpl->tpl_vars['reason']->value){?>'<?php echo $_smarty_tpl->tpl_vars['reason']->value;?>
'<?php }?>);"></a>
<a class="b-idea-share-btn tw" onclick="Auth.twitter(<?php if (isset($_smarty_tpl->tpl_vars['reason']->value)&&$_smarty_tpl->tpl_vars['reason']->value){?>'<?php echo $_smarty_tpl->tpl_vars['reason']->value;?>
'<?php }?>);"></a><?php }} ?>