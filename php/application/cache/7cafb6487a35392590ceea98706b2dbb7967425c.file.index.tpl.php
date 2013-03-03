<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 10:46:24
         compiled from "application/views/global/idea/team/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1738643955512f19601aedd6-58929349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cafb6487a35392590ceea98706b2dbb7967425c' => 
    array (
      0 => 'application/views/global/idea/team/index.tpl',
      1 => 1362036884,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1738643955512f19601aedd6-58929349',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'team' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512f19601dc1c8_02047572',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512f19601dc1c8_02047572')) {function content_512f19601dc1c8_02047572($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['team']->value){?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['team']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <div class="b-idea-team-item">
            <a class="b-idea-team-item-avatar" style="background-image: url(/<?php echo $_smarty_tpl->tpl_vars['item']->value['avatar_s'];?>
);"></a>
            <a class="b-idea-team-item-iname"><?php echo $_smarty_tpl->tpl_vars['item']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['last_name'];?>
</a>
            <div class="b-idea-team-item-idesc"><?php echo $_smarty_tpl->tpl_vars['item']->value['role'];?>
</div>
        </div>
    <?php } ?>
<?php }?><?php }} ?>