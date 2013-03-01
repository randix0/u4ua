<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 14:50:12
         compiled from "application/views/modals/voteIdea/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:494724915512f528424a7f3-78849877%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a39e2bf5e8162bc864a9df5afbf436a932be00ef' => 
    array (
      0 => 'application/views/modals/voteIdea/index.tpl',
      1 => 1362055334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '494724915512f528424a7f3-78849877',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idea_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512f52842e2521_34446477',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512f52842e2521_34446477')) {function content_512f52842e2521_34446477($_smarty_tpl) {?><h3 class="b-section-h3">Поддержи идею</h3>
<a class="b-idea-share-btn fb mR10px" onclick="U4ua.idea.vote(<?php echo $_smarty_tpl->tpl_vars['idea_id']->value;?>
,'fb')"></a>
<a class="b-idea-share-btn vk mR10px" onclick="U4ua.idea.vote(<?php echo $_smarty_tpl->tpl_vars['idea_id']->value;?>
,'vk')"></a>
<a class="b-idea-share-btn gp mR10px" onclick="U4ua.idea.vote(<?php echo $_smarty_tpl->tpl_vars['idea_id']->value;?>
,'gp')"></a>
<a class="b-idea-share-btn tw"  onclick="U4ua.idea.vote(<?php echo $_smarty_tpl->tpl_vars['idea_id']->value;?>
,'tw')"></a><?php }} ?>