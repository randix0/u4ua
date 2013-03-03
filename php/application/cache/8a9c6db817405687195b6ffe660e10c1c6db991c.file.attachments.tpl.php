<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 10:56:02
         compiled from "application/views/modals/upload/attachments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1264252028512f1ba2d16a83-00918399%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a9c6db817405687195b6ffe660e10c1c6db991c' => 
    array (
      0 => 'application/views/modals/upload/attachments.tpl',
      1 => 1362035056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1264252028512f1ba2d16a83-00918399',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'files' => 0,
    'file' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512f1ba2dde6e8_56769227',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512f1ba2dde6e8_56769227')) {function content_512f1ba2dde6e8_56769227($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/www/u4ua.lo/www/application/libraries/smarty/plugins/function.counter.php';
?><?php if ($_smarty_tpl->tpl_vars['files']->value){?>
<form id="saveAttachments" method="post" action="/ajax/saveAttachments">
    <?php echo smarty_function_counter(array('start'=>0,'assign'=>'i'),$_smarty_tpl);?>

    <?php  $_smarty_tpl->tpl_vars['file'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['file']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['file']->key => $_smarty_tpl->tpl_vars['file']->value){
$_smarty_tpl->tpl_vars['file']->_loop = true;
?>
        <div class="b-file <?php if ($_smarty_tpl->tpl_vars['file']->value['ext']){?><?php echo $_smarty_tpl->tpl_vars['file']->value['ext'];?>
<?php }?> mB20px">
            <input type="hidden" name="item[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][store_name]" value="<?php echo $_smarty_tpl->tpl_vars['file']->value['store_name'];?>
" />
            <input type="hidden" name="item[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][type]" value="<?php echo $_smarty_tpl->tpl_vars['file']->value['type'];?>
" />
            <input type="hidden" name="item[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][ext]" value="<?php echo $_smarty_tpl->tpl_vars['file']->value['ext'];?>
" />
            <input type="hidden" name="item[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][path]" value="<?php echo $_smarty_tpl->tpl_vars['file']->value['path'];?>
" />
            <input type="hidden" name="item[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][idea_id]" value="<?php echo $_smarty_tpl->tpl_vars['file']->value['idea_id'];?>
" />
            <div class="in-text mB25px"><input type="text" disabled="disabled" value="<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
"></div>

            <h4 class="b-section-h4">Описание файла</h4>
            <div class="in-text mB25px"><input type="text" name="item[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
][iname]" placeholder="Бизнес-план проекта" value="<?php echo $_smarty_tpl->tpl_vars['file']->value['name'];?>
"></div>
            <hr>
        </div>
        <?php echo smarty_function_counter(array(),$_smarty_tpl);?>

    <?php } ?>
    <a class="button" onclick="Attachment.save();">Добавить</a>
</form>

<script type="text/javascript">
    var parent = this;
    Attachment = {
        save: function(){
            $.ajax({
                url: '/ajax/saveAttachments',
                type: 'POST',
                data: $('#saveAttachments').serialize(),
                dataType: 'json',
                success: function(data){
                    if (data.status == 'success'){
                        if (data.html)
                        $('#idea_attachments').append(data.html);
                        Window.close('win-upload');
                    } else {
                        console.log('Idea.save: error!');
                    }
                }
            });
        }
    };
</script>
<?php }?><?php }} ?>