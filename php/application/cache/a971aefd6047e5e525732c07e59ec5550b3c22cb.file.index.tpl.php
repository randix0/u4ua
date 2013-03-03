<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 10:46:24
         compiled from "application/views/global/idea/attachments/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1124767139512f196018c818-07668284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a971aefd6047e5e525732c07e59ec5550b3c22cb' => 
    array (
      0 => 'application/views/global/idea/attachments/index.tpl',
      1 => 1362028891,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1124767139512f196018c818-07668284',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'attachments' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512f19601abb84_27623754',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512f19601abb84_27623754')) {function content_512f19601abb84_27623754($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['attachments']->value){?>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attachments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <div class="left w210px mR10px">
            <a class="b-idea-getFile <?php echo $_smarty_tpl->tpl_vars['item']->value['ext'];?>
" href=""><?php echo $_smarty_tpl->tpl_vars['item']->value['iname'];?>
</a>
        </div>
    <?php } ?>
<?php }?><?php }} ?>