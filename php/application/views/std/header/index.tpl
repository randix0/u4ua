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
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" type="image/png" href="./favicon.png">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="{$RESOURCES_URL}css/normalize.css">
    <link rel="stylesheet" href="{$RESOURCES_URL}css/main.css">
    <script src="{$RESOURCES_URL}js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="{$RESOURCES_URL}js/vendor/jquery-1.8.3.min.js"></script>
    <script src="{$RESOURCES_URL}js/plugins.js"></script>
    <script src="{$RESOURCES_URL}js/main.js"></script>
    <script>
        var vk_app_id = {$VK_APP_ID},
                fb_app_id = {$FB_APP_ID},
                gl_app_id = {$GL_APP_ID};
    </script>
    <script src="{$RESOURCES_URL}js/auth.js"></script>
    <script src="{$RESOURCES_URL}js/window.js"></script>
</head>
<body class="body-{if isset($__PAGE) && $__PAGE}{$__PAGE}{/if}">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->


<header class="b-header">
    <div class="b-toolbar">
        <div class="b-toolbar-body layout w976px">
            <div class="b-chLang">
                <a class="b-chLang-item {if $_LANG == 'ua'}active{/if}" href="/ua/">українська</a>
                <a class="b-chLang-item {if $_LANG == 'en'}active{/if}" href="/en/">english</a>
            </div>
            <div class="b-login">
                {if isset($LOGGED) && $LOGGED}
                    <a class="b-login-avatar" style=""></a>
                    <a class="b-login-iname">Василий Пупкин</a>
                    <a class="b-login-logout" href="">{l}вийти{/l}<i class="i-logout"></i></a>
                {else}
                    <a class="b-login-login" onclick="Auth.facebook(); return false;">{l}увійти{/l}<i class="i-logout"></i></a>
                {/if}
            </div>
            <div class="b-share">
                {l}Розкажи друзям{/l}
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
        <a class="b-header-nav-item {if isset($__PAGE) && $__PAGE == 'main'}active{/if}" href="/{$_LANG}/">{l}Головна{/l}</a>
        <a class="b-header-nav-item {if isset($__PAGE) && $__PAGE == 'judges'}active{/if}" href="/{$_LANG}/judges/">{l}Судді{/l}</a>
        <a class="b-header-nav-item {if isset($__PAGE) && $__PAGE == 'prizes'}active{/if}" href="/{$_LANG}/prizes/">{l}Умови конкурсу{/l}</a>
        <a class="b-header-nav-item {if isset($__PAGE) && $__PAGE == 'partners'}active{/if}" href="/{$_LANG}/partners/">{l}Партнери{/l}</a>
        <a class="b-header-nav-item {if isset($__PAGE) && $__PAGE == 'about'}active{/if}" href="/{$_LANG}/about/">{l}Про проект{/l}</a>
    </nav>
    {if isset($__PAGE) && $__PAGE == 'main'}
    <div class="b-header-body">
        <div class="layout w976px relative">
            <a class="b-header-button" href="/{$_LANG}/newidea/">{l}Поділись своєю ідеєю{/l}</a>
            <div class="b-header-btn-span0">{l}АБО{/l}</div>
            <div class="b-header-btn-span1">{l}ПІДТРИМАЙ ідеї людей, <br> хто перетворює Україну на краще{/l}</div>
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
                        <a class="b-partnersBlock-item" style="background-image: url({$RESOURCES_URL}img/partners/pinchuk.jpg);" href="/partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url({$RESOURCES_URL}img/partners/eastlabs.jpg);" href="/partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url({$RESOURCES_URL}img/partners/microsoft.jpg);" href="/partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url({$RESOURCES_URL}img/partners/google.jpg);" href="/partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url({$RESOURCES_URL}img/partners/microsoft.jpg);" href="/partners"></a>
                        <a class="b-partnersBlock-item" style="background-image: url({$RESOURCES_URL}img/partners/google.jpg);" href="/partners"></a>
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