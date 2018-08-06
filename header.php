<!DOCTYPE html>
<html lang="<? bloginfo('language') ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= wp_get_document_title() ?></title>
    <? wp_head() ?>
    <link rel="shortcut icon" href="<?= path() ?>img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="<?= path() ?>img/favicon/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= path() ?>img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= path() ?>img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= path() ?>img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= path() ?>img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= path() ?>img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= path() ?>img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= path() ?>img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= path() ?>img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= path() ?>img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= path() ?>img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= path() ?>img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= path() ?>img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= path() ?>img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-70x70.png">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-150x150.png">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-310x310.png">
</head>
<body <? body_class() ?>>
<? if (!is_404()): ?>
    <header class="header">
        <button class="toggle-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </header>
    <div class="right-menu">
        <ul class="desktop">
            <? wp_nav_menu([
                'menu' => 'Меню',
                'container' => null,
                'items_wrap' => '%3$s',
            ]); ?>
        </ul>
        <ul class="mobile">
            <li><a href="#main">
                    <div class="home"></div>
                </a></li>
            <li><a href="#about">О нас</a>
            </li>
            <li><a href="#wwd">Что мы решаем?</a>
            </li>
            <li><a href="#team">Наша команда</a>
            </li>
            <li><a href="#testimonials">Отзывы и клиенты</a>
            </li>
            <li><a href="#about-us">Почему мы?</a>
            </li>
            <li><a href="#works">работы</a>
            </li>
            <li><a href="#news">новости</a>
            </li>
            <li><a href="#contacts">Контакты</a>
            </li>
            <? wp_nav_menu([
                'menu' => 'Меню',
                'container' => null,
                'items_wrap' => '%3$s',
            ]); ?>
        </ul>
    </div>
<? endif; ?>
<style>
    .preloader-wrapper {
        display: flex;
        flex-flow: column wrap;
        justify-content: center;
        align-items: center;
        width: 100%;
        min-height: 100vh;
        background-color: #101a15;
        z-index: 100500;
        position: fixed;
        top: 0
    }

    .preloader-wrapper svg {
        -webkit-transform: rotate3d(0, 0, 1, -90deg);
        transform: rotate3d(0, 0, 1, -90deg)
    }

    .preloader-wrapper svg circle {
        fill: none;
        stroke: #444;
        stroke-width: 1px;
        will-change: transform;
        -webkit-transform-origin: center center;
        transform-origin: center center;
        -webkit-animation-name: rotate;
        animation-name: rotate;
        -webkit-animation-timing-function: linear;
        animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite
    }

    .preloader-wrapper svg .inner {
        stroke: #3ab0e2;
        stroke-dasharray: 200.96;
        stroke-dashoffset: 160.96;
        -webkit-animation-delay: 200ms;
        animation-delay: 200ms;
        -webkit-animation-duration: 1s;
        animation-duration: 1s
    }

    .preloader-wrapper svg .middle {
        stroke: #34d293;
        stroke-dasharray: 238.64;
        stroke-dashoffset: 178.64;
        -webkit-animation-delay: 100ms;
        animation-delay: 100ms;
        -webkit-animation-duration: 1.5s;
        animation-duration: 1.5s
    }

    .preloader-wrapper svg .outer {
        stroke: #f26522;
        stroke-dasharray: 276.32;
        stroke-dashoffset: 176.32;
        -webkit-animation-delay: 300ms;
        animation-delay: 300ms;
        -webkit-animation-duration: 2s;
        animation-duration: 2s
    }

    .modal-vertical-center {
        text-align: center;
        padding: 0 !important
    }

    .modal-vertical-center:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px
    }

    .modal-vertical-center .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle
    }
</style>
<div class="preloader-wrapper">
    <svg viewBox="0 0 120 120" width="120px" height="120px">
        <circle class="inner" cx="60" cy="60" r="32"/>
        <circle class="middle" cx="60" cy="60" r="38"/>
        <circle class="outer" cx="60" cy="60" r="44"/>
    </svg>
</div>