<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 10:55:52
         compiled from "application/views/modals/upload/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:978388115512f1b983c5c24-01362632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66122df3d850c18da61aec9ccd5f78845201afb8' => 
    array (
      0 => 'application/views/modals/upload/index.tpl',
      1 => 1362035756,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '978388115512f1b983c5c24-01362632',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'upload_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512f1b9842afc1_60463306',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512f1b9842afc1_60463306')) {function content_512f1b9842afc1_60463306($_smarty_tpl) {?><script type="text/javascript">
    Upload.callback = function(data){
        if (data.status == 'success' && data.html) {
            $('#wrapper').html(data.html);
            Window.onBodyResize();
        }
    };
    Upload.init(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
,'<?php echo $_smarty_tpl->tpl_vars['upload_type']->value;?>
');
    //console.log('id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 upload_type=<?php echo $_smarty_tpl->tpl_vars['upload_type']->value;?>
');
</script>
<section id="wrapper">
    <style>
        #holder { border: 3px dashed #ccc;  min-height: 40px; margin: 0 auto 10px auto;}
        #holder.hover { border: 3px dashed #0c0; }
        #holder img { display: block; margin: 10px auto; }
        #holder p { margin: 10px; font-size: 14px; }
        progress { width: 100%; }
        progress:after { content: '%'; }
        .fail { background: #c00; padding: 2px; color: #fff; }
        .hidden { display: none !important;}
    </style>
    <article>
        <div id="holder">
            <h3 class="tCenter">Drag & drop files or <a onclick="$('#input_userfile').trigger('click');">choose</a></h3>
        </div>
        <p id="upload" class="hidden"><label>Drag & drop not supported, but you can still upload via this input field:<br><input id="input_userfile" type="file"></label></p>

        <p id="filereader">File API & FileReader API not supported</p>
        <p id="formdata">XHR2's FormData is not supported</p>
        <p id="progress">XHR2's upload progress isn't supported</p>

        <div><progress id="uploadprogress" min="0" max="100" value="0">0</progress></div>

        
    </article>
</section><?php }} ?>