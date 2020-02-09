<?php

//namespace Application;
return array(

    //регулярное выражение запроса => контроллер/action/параметры

    'error' => 'errorController/actionIndex',

    'my-tests/empty' => 'TestsController/actionShowEmpty',
    'my-tests' => 'TestsController/actionIndex',

    //(.*) - любые символы
    'download/(.*?)' => 'SiteController/actionGetFile/$1',
    // 'downloads' => 'SiteController/actionDownloadsDef',
    'sign/(reg|login)' => 'SignUpInController/acnSign/$1',
    'sign/unlog' => 'SignUpInController/acnUnlog',
    'sign/doreg' => 'SignUpInController/actionRegister',
    'sign/auth' => 'SignUpInController/acnAuth',
    'signUp/userAgreement' => 'SignUpInController/actionUserAgreement',

    //плюс означает что символ может встертиться любое количество раз, $1 - первая подмаска (распарсит в параметры функции)
    //подмаски ограничиваются круглыми скобками
    //{N} - повторение N раз
    //урок 2 8-9 минута
    // '/climate/([0-9]+)' => 'ClimateController/actionIndex/$1',

    'climate/([0-9]+)' => 'ClimateController/actionView/$1',
    'climate' => 'ClimateController/actionIndex',

    'seismic/([0-9]+)' => 'SeismicController/actionView/$1',
    'seismic/allEarthquakes' => 'SeismicController/actionEarthquakes',
    'seismic/getEarthquakes' => 'SeismicController/switchAction',
    'seismic' => 'SeismicController/actionIndex',
    // 'calculators/num2str' => 'CalculatorController/actionNum2str',

    'geophysics' => 'GeophysicsController/actionIndex',
    'calculators/num2str' => 'CalculatorController/actionNum2strNum',
    'calculators/converterKML' => 'CalculatorController/actionConverterKML',

    //'calculators/num2str?number=([0-9]+)' => 'CalculatorController/actionNum2strNum',
    'calculators' => 'CalculatorController/actionIndex',

    'railways' => 'RailwaysController/actionIndex',

    'admin/httpheaders' => 'AdminController/actionHeaders',
    'admin/sql' => 'AdminController/actionSql',
    'admin/dump' => 'AdminController/actionDump',
    'admin' => 'AdminController/actionIndex',
    'admin2' => 'AdminController/actionIndex2',

    //'calculators/num2str/([0-9]+)' => 'Num2strController/actionIndex/$1',
    '' => 'SiteController/actionIndex', // actionIndex в SiteController
    //silver-hoof
);
