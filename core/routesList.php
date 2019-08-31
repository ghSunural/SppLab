<?php
//namespace Application;
return array(

    //регулярное выражение запроса => контроллер/action/параметры
    'admin/site' => 'SiteController/actionIndex',
    'error' => 'errorController/actionIndex',

    //плюс означает что символ может встертиться любое количество раз, $1 - первая подмаска (распарсит в параметры функции)
    //подмаски ограничиваются круглыми скобками
    //{N} - повторение N раз
    //урок 2 8-9 минута
    // '/climate/([0-9]+)' => 'ClimateController/actionIndex/$1',
    'climate/([0-9]+)' => 'ClimateController/actionView/$1',
    'climate' => 'ClimateController/actionIndex',
    // 'calculators/num2str)' => 'Num2strController/actionIndex',
    // 'calculators/num2str/([0-9]+)' => 'Num2strController/actionIndex/$1',
    '' => 'SiteController/actionIndex' // actionIndex в SiteController
    //silver-hoof
);


?>
