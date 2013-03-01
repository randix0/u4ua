<?php /* Smarty version Smarty-3.1.13, created on 2013-03-01 18:41:02
         compiled from "application/views/modals/upload/attachments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18259536215130d661797a64-42869051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a9c6db817405687195b6ffe660e10c1c6db991c' => 
    array (
      0 => 'application/views/modals/upload/attachments.tpl',
      1 => 1362156059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18259536215130d661797a64-42869051',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5130d6617f4d81_33258718',
  'variables' => 
  array (
    'RESOURCES_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5130d6617f4d81_33258718')) {function content_5130d6617f4d81_33258718($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>u4ua</title>
    <meta name="description" content="">
    <link rel="icon" type="image/png" href="/favicon.png">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
css/normalize.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
css/main.css">
    <script src="<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
js/vendor/jquery-1.8.3.min.js"></script>
</head>
<body>

<h4 class="b-section-h4">Название файла</h4>
<div class="in-text mB25px"><input type="text" placeholder="Бизнес-план проекта"></div>
<h4 class="b-section-h4">Загрузить файл</h4>
<div class="in-file mB25px"><input type="file"></div>
<a class="button">Добавить</a>

</body>
</html><?php }} ?>