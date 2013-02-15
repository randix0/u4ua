<?php /* Smarty version Smarty-3.1.13, created on 2013-02-15 16:24:52
         compiled from "application/views/std/header/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1312430522511cdda6b9e730-20913457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0efecd3fc733179884301934a5bb643de1de061' => 
    array (
      0 => 'application/views/std/header/index.tpl',
      1 => 1360938272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1312430522511cdda6b9e730-20913457',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_511cdda6ba11b8_72107010',
  'variables' => 
  array (
    'RESOURCES_URL' => 0,
    'VK_APP_ID' => 0,
    'FB_APP_ID' => 0,
    'GL_APP_ID' => 0,
    '__PAGE' => 0,
    '_LANG' => 0,
    'LOGGED' => 0,
    'USER_DATA' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511cdda6ba11b8_72107010')) {function content_511cdda6ba11b8_72107010($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>u4ua</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" type="image/png" href="./favicon.png">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
css/normalize.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
css/main.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
css/window.css">
    <script src="<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
js/vendor/jquery-1.8.3.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
js/plugins.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
js/main.js"></script>
    <script>
        var vk_app_id = <?php echo $_smarty_tpl->tpl_vars['VK_APP_ID']->value;?>
,
                fb_app_id = <?php echo $_smarty_tpl->tpl_vars['FB_APP_ID']->value;?>
,
                gl_app_id = <?php echo $_smarty_tpl->tpl_vars['GL_APP_ID']->value;?>
;
    </script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
js/auth.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
js/window.js"></script>
</head>
<body class="body-<?php if (isset($_smarty_tpl->tpl_vars['__PAGE']->value)&&$_smarty_tpl->tpl_vars['__PAGE']->value){?><?php echo $_smarty_tpl->tpl_vars['__PAGE']->value;?>
<?php }?>">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->


<header class="b-header">
    <div class="b-toolbar">
        <div class="b-toolbar-body layout w976px">
            <div class="b-chLang">
                <a class="b-chLang-item <?php if ($_smarty_tpl->tpl_vars['_LANG']->value=='ua'){?>active<?php }?>" href="/ua/">українська</a>
                <a class="b-chLang-item <?php if ($_smarty_tpl->tpl_vars['_LANG']->value=='en'){?>active<?php }?>" href="/en/">english</a>
            </div>
            <div class="b-login">
                <?php if (isset($_smarty_tpl->tpl_vars['LOGGED']->value)&&$_smarty_tpl->tpl_vars['LOGGED']->value){?>
                    <a class="b-login-avatar" style=""><img src="https://graph.facebook.com/<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['facebook_id'];?>
/picture" width=24 height=24 /></a>
                    <a class="b-login-iname"><?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['last_name'];?>
</a>
                    <a class="b-login-logout" href="/auth/logout"><?php $_smarty_tpl->smarty->_tag_stack[] = array('l', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
вийти<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<i class="i-logout"></i></a>

                    <div style="display: none;">
                    <?php echo var_dump($_smarty_tpl->tpl_vars['USER_DATA']->value);?>

                    </div>
                <?php }else{ ?>
                    <a class="b-login-login" onclick="Auth.facebook(); return false;"><?php $_smarty_tpl->smarty->_tag_stack[] = array('l', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
увійти<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<i class="i-logout"></i></a>
                <?php }?>
            </div>
            <div class="b-share">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('l', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Розкажи друзям<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                <a class="b-share-btn fb" href=""></a>
                <a class="b-share-btn tw" href=""></a>
                <a class="b-share-btn gp" href=""></a>
                <a class="b-share-btn vk" href=""></a>
            </div>
        </div>
    </div>
    <nav class="b-header-nav layout w976px">
        <a class="b-logo" href="/">
            <span class="b-logo-beta">beta</span>
        </a>
        <a class="b-header-nav-item <?php if (isset($_smarty_tpl->tpl_vars['__PAGE']->value)&&$_smarty_tpl->tpl_vars['__PAGE']->value=='main'){?>active<?php }?>" href="/<?php echo $_smarty_tpl->tpl_vars['_LANG']->value;?>
/"><?php $_smarty_tpl->smarty->_tag_stack[] = array('l', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Головна<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
        <a class="b-header-nav-item <?php if (isset($_smarty_tpl->tpl_vars['__PAGE']->value)&&$_smarty_tpl->tpl_vars['__PAGE']->value=='judges'){?>active<?php }?>" href="/<?php echo $_smarty_tpl->tpl_vars['_LANG']->value;?>
/judges/"><?php $_smarty_tpl->smarty->_tag_stack[] = array('l', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Судді<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
        <a class="b-header-nav-item <?php if (isset($_smarty_tpl->tpl_vars['__PAGE']->value)&&$_smarty_tpl->tpl_vars['__PAGE']->value=='prizes'){?>active<?php }?>" href="/<?php echo $_smarty_tpl->tpl_vars['_LANG']->value;?>
/prizes/"><?php $_smarty_tpl->smarty->_tag_stack[] = array('l', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Умови конкурсу<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
        <a class="b-header-nav-item <?php if (isset($_smarty_tpl->tpl_vars['__PAGE']->value)&&$_smarty_tpl->tpl_vars['__PAGE']->value=='partners'){?>active<?php }?>" href="/<?php echo $_smarty_tpl->tpl_vars['_LANG']->value;?>
/partners/"><?php $_smarty_tpl->smarty->_tag_stack[] = array('l', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Партнери<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
        <a class="b-header-nav-item <?php if (isset($_smarty_tpl->tpl_vars['__PAGE']->value)&&$_smarty_tpl->tpl_vars['__PAGE']->value=='about'){?>active<?php }?>" href="/<?php echo $_smarty_tpl->tpl_vars['_LANG']->value;?>
/about/"><?php $_smarty_tpl->smarty->_tag_stack[] = array('l', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Про проект<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
    </nav>
    <?php if (isset($_smarty_tpl->tpl_vars['__PAGE']->value)&&$_smarty_tpl->tpl_vars['__PAGE']->value=='main'){?>
    <div class="b-header-body">
        <div class="layout w976px relative">
            <a class="b-header-button" href="/<?php echo $_smarty_tpl->tpl_vars['_LANG']->value;?>
/idea/add/"><?php $_smarty_tpl->smarty->_tag_stack[] = array('l', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Поділись своєю ідеєю<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
            <div class="b-header-btn-span0"><?php $_smarty_tpl->smarty->_tag_stack[] = array('l', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
АБО<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div>
            <div class="b-header-btn-span1"><?php $_smarty_tpl->smarty->_tag_stack[] = array('l', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
ПІДТРИМАЙ ідеї людей, <br> хто перетворює Україну на краще<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['l'][0][0]->smartyBlockTranslate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div>
            <div class="b-header-video">
                <a class="b-header-video-frame" href="">
                    <div class="b-header-video-play"></div>
                </a>
                <div class="b-header-video-desc">
                    <a class="b-header-video-iname" href="#">Давай змінемо цей світ на краще разом!</a><br/>
                    <div class="b-header-video-author" href="#">— Святослав Вакарчук</div>
                </div>

                <a class="b-header-video-viewAll" href="#">Перегляд всіх відео</a>
            </div>
        </div>
    </div>
    <div class="b-header-footer">
        <div class="b-partnersBlock">
            <div class="b-partnersBlock-header">партнери</div>
            <a class="b-partnersBlock-prev"></a>
            <a class="b-partnersBlock-next"></a>

            <div class="b-partnersBlock-body">
                <div class="b-partnersBlock-wrap">
                    <div class="b-partnersBlock-sizer">
                        <a class="b-partnersBlock-item" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
img/partners/pinchuk.jpg);" href="/partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
img/partners/eastlabs.jpg);" href="/partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
img/partners/microsoft.jpg);" href="/partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
img/partners/google.jpg);" href="/partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
img/partners/microsoft.jpg);" href="/partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['RESOURCES_URL']->value;?>
img/partners/google.jpg);" href="/partners"></a>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function(){
                    U4ua.partnersSlider.init();
                });
            </script>
        </div>
    </div>
    <?php }?>
</header><?php }} ?>