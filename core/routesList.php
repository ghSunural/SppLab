<?php
//namespace Application;
return array(

    //регулярное выражение запроса => контроллер/action/параметры

    'error' => 'errorController/actionIndex',

    'my-tests/empty' => 'TestsController/actionShowEmpty',
    'my-tests' => 'TestsController/actionIndex',

    //(.*) - любые символы
    'download/(.*)' => 'DownloadController/actionGetFile/$1',
    'downloads' => 'DownloadController/actionIndex',

    'signin/reg' => 'signinController/actionRegister',
    'signin' => 'signinController/actionIndex',
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
    //'calculators/num2str?number=([0-9]+)' => 'CalculatorController/actionNum2strNum',
    'calculators' => 'CalculatorController/actionIndex',

    'railways' => 'RailwaysController/actionIndex',

    'admin/httpheaders' => 'AdminController/actionHeaders',
    'admin/sql' => 'AdminController/actionSql',
    'admin' => 'AdminController/actionIndex',


    //'calculators/num2str/([0-9]+)' => 'Num2strController/actionIndex/$1',
    '' => 'SiteController/actionIndex' // actionIndex в SiteController
    //silver-hoof
);


?>
