<!DOCTYPE html>
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

    <link rel="stylesheet" href="{$RESOURCES_URL}css/normalize.css">
    <link rel="stylesheet" href="{$RESOURCES_URL}css/main.css">
    <link rel="stylesheet" href="{$RESOURCES_URL}css/window.css">
    <script src="{$RESOURCES_URL}js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="{$RESOURCES_URL}js/vendor/jquery-1.8.3.min.js"></script>
    <script src="{$RESOURCES_URL}js/plugins.js"></script>
    <script src="{$RESOURCES_URL}js/main.js"></script>
    <script src="{$RESOURCES_URL}js/modernizr-transitions.js"></script>
    <script src="{$RESOURCES_URL}js/jquery.masonry.min.js"></script>
    {*<script src="{$RESOURCES_URL}js/jquery.history.js"></script>*}

    <script>
        var vk_app_id = '{$VK_APP_ID}',
                fb_app_id = '{$FB_APP_ID}',
                gl_app_id = '{$GL_APP_ID}',
                BASE_URL = '{$BASE_URL}',
                SITE_URI = '{$SITE_URI}',
                LOGGED = {if $LOGGED}{$LOGGED}{else}0{/if};
    </script>
    <script src="{$RESOURCES_URL}js/auth.js"></script>
    <script src="{$RESOURCES_URL}js/window.js"></script>
</head>
<body class="body-{if isset($__PAGE) && $__PAGE}{$__PAGE}{/if}">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<div id="dimmer" class="dimmer" style="display: none;"></div>
<div id="modal_layer_wrap" class="modal_layer_wrap" style="display: none;">
    <div id="modal_layer" class="modal_layer"></div>
</div>

<header class="b-header">
    <div class="b-toolbar">
        <div class="b-toolbar-body layout w976px">
            <div class="b-chLang">
                <a class="b-chLang-item {if $_LANG == 'ua'}active{/if}" href="/ua/{$CURRENT_URL}">українська</a>
                <a class="b-chLang-item {if $_LANG == 'en'}active{/if}" href="/en/{$CURRENT_URL}">english</a>
            </div>
            <div class="b-login">
                {if isset($LOGGED) && $LOGGED}
                    <a class="b-login-avatar" href="{$SITE_URL}my"><img src="{if $USER_DATA.avatar_s}/{$USER_DATA.avatar_s}{/if}" width=24 height=24 /></a>
                    <a class="b-login-iname" href="{$SITE_URL}my">{$USER_DATA.first_name} {$USER_DATA.last_name}</a>
                    {*<a class="b-login-login" onclick="Window.load('/modal/login/merge','win-login','');">{l}add social{/l}<i class="i-logout"></i></a>*}
                    <a class="b-login-logout" href="/auth/logout">{l}HEADER_LOGOUT{/l}<i class="i-logout"></i></a>
                {else}
                    {* Auth.facebook(); return false; *}
                    <a class="b-login-login" onclick="Window.load('/modal/login','win-login','');">{l}HEADER_LOGIN{/l}<i class="i-logout"></i></a>
                {/if}

                <div style="display: none;">
                    {$USER_DATA|var_dump}
                    {$SESSION|var_dump}
                </div>
            </div>
            <div class="b-share">
                {l}HEADER_SHARE{/l}
                <a class="b-share-btn fb" href=""></a>
                <a class="b-share-btn tw" href=""></a>
                <a class="b-share-btn gp" href=""></a>
                <a class="b-share-btn vk" href=""></a>
            </div>
        </div>
    </div>
    <nav class="b-header-nav layout w976px">
        <a class="b-logo" href="{$SITE_URI}">
            <span class="b-logo-beta">beta</span>
        </a>
        <a class="b-header-nav-item {if isset($__PAGE) && $__PAGE == 'main'}active{/if}" href="{$SITE_URL}">{l}NAV_MAIN{/l}</a>
        <a class="b-header-nav-item {if isset($__PAGE) && $__PAGE == 'judges'}active{/if}" href="{$SITE_URL}judges/">{l}NAV_JUDGES{/l}</a>
        <a class="b-header-nav-item {if isset($__PAGE) && $__PAGE == 'prizes'}active{/if}" href="{$SITE_URL}prizes/">{l}NAV_PRIZES{/l}</a>
        <a class="b-header-nav-item {if isset($__PAGE) && $__PAGE == 'partners'}active{/if}" href="{$SITE_URL}partners/">{l}NAV_PARTNERS{/l}</a>
        <a class="b-header-nav-item {if isset($__PAGE) && $__PAGE == 'about'}active{/if}" href="{$SITE_URL}about/">{l}NAV_ABOUT{/l}</a>
    </nav>
    {if isset($__PAGE) && $__PAGE == 'main'}
    <div class="b-header-body">
        <div class="layout w976px relative">
            <a class="b-header-button" {if $LOGGED}href="{$SITE_URL}idea/add/"{else}onclick="Window.load('{$SITE_URL}modal/login','win-login','');"{/if}>{l}HEADER_SHARE_YOUR_IDEA{/l}</a>
            <div class="b-header-btn-span0">{l}HEADER_OR{/l}</div>
            <div class="b-header-btn-span1">{l}HEADER_SUPPORT_IDEAS{/l}</div>
            <div class="b-header-video">
                <a class="b-header-video-frame" href="">
                    <div class="b-header-video-play"></div>
                </a>
                <div class="b-header-video-desc">
                    <a class="b-header-video-iname" href="#">{l}HEADER_VIDEO_INAME{/l}</a><br/>
                    <div class="b-header-video-author" href="#">— {l}HEADER_VIDEO_AUTHOR{/l}</div>
                </div>

                <a class="b-header-video-viewAll" href="{$SITE_URL}videos">{l}HEADER_VIDEO_ALL{/l}</a>
            </div>
        </div>
    </div>
    <div class="b-header-footer">
        <div class="b-partnersBlock">
            <div class="b-partnersBlock-header">{l}HEADER_PARTNERS{/l}</div>
            <a class="b-partnersBlock-prev"></a>
            <a class="b-partnersBlock-next"></a>

            <div class="b-partnersBlock-body">
                <div class="b-partnersBlock-wrap">
                    <div class="b-partnersBlock-sizer">
                        <a class="b-partnersBlock-item" style="background-image: url({$RESOURCES_URL}img/partners/pinchuk.jpg);" href="{$SITE_URL}partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url({$RESOURCES_URL}img/partners/eastlabs.jpg);" href="{$SITE_URL}partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url({$RESOURCES_URL}img/partners/microsoft.jpg);" href="{$SITE_URL}partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url({$RESOURCES_URL}img/partners/google.jpg);" href="{$SITE_URL}partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url({$RESOURCES_URL}img/partners/microsoft.jpg);" href="{$SITE_URL}partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url({$RESOURCES_URL}img/partners/google.jpg);" href="{$SITE_URL}partners"></a>
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
    {/if}
</header>