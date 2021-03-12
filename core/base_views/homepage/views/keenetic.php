<?php ?>
<!doctype html >
<html ng - app="keenetic" ng
      -class="{ 'device_pc': $root.isBrowserForPC, 'device_handheld': !$root.isBrowserForPC, 'no-scroll': $root.menuIsOpenOverlayed || $root.uiViewOverlap || ($root.isBrowserForPC && !$root.isInitialSetupWizard) }"
      update - language="">
<head>
    <meta charset="utf-8">
    <title ng - bind="$root.title"> Keenetic Web </title>
    <meta name="description" content="">
    <base href="/">
    <meta name="apple-mobile-web-app-title" content="Keenetic Web">
    <meta name="application-name" content="Keenetic Web">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="MobileOptimized" content="320">
    <meta name="HandheldFriendly" content="true">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon-16x16.png">
    <link rel="mask-icon" color="#3098d8" href="/assets/img/safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#2d405c">
    <meta name="msapplication-TileImage" content="/assets/img/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="manifest" href="/assets/manifest.json">
    <meta name="msapplication-config" content="/assets/browserconfig.xml">
    <style>
        .ng

        -
        cloak,
        [ng

        -
        cloak

        ]
        ,
        [ng\:cloak] {
            display: none !important;
        }

        .noscript {
            text -align: center;
            max -width: 38rem;
            padding: 2rem;
            margin: auto;
        }
    </style>
    <link rel="stylesheet" href="styles/vendor-96c6133a5f.css">
    <link rel="stylesheet" href="styles/app-b264e3950d.css">
</head>
<body class="body body-text {{$root.bodyPageClass}}" ng
      -class="{ 'body--white': $root.isLoginPage, 'body__full-screen': $root.isAlertFullScreen, 'device_pc': $root.isBrowserForPC, 'device_handheld': !$root.isBrowserForPC, 'no-scroll': $root.menuIsOpenOverlayed || $root.uiViewOverlap || ($root.isBrowserForPC && !$root.isInitialSetupWizard) }">
<ndm - layout>
    <div ui - view="" class="ndm-ui-view {{$root.uiViewClass}}"></div>
</ndm - layout>
<script src="scripts/vendor-760eb7d9d0.js"></script>
<script src="scripts/app-23d56f81bc.js"></script>
<script type="text/javascript" src="/ndmConstants.js"></script>
<script type="text/javascript" src="/ndmComponents.js"></script>
<script type="text/javascript" src="/version.js"></script>
<noscript>
    <div class="noscript"><h1> Please enable JavaScript support < br>in your browser </h1></div>
</noscript>
</body>
</html>