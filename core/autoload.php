<?php

//echo "<br>";
spl_autoload_register('autoload');

function autoload($className)
{
    $folders = array(

        'config',
        'core',
        'core/API',
        'core/auth',
        'core/base_controllers',
        'core/base_views',
        'core/base_views/homepage/controllers',
        'core/base_views/homepage/views',
        'core/router',
        'core/util',
        'core/util/DB',
        'core/util/ErrorHandler',
        'core/util/html',
        'models',
        'util',
        'util/geo',
        'unitTests',

        'pages/admin/models',
        'pages/admin/controllers',

        'pages/signUpIn/models',
        'pages/signUpIn/controllers',

        'pages/climate/models',
        'pages/climate/controllers',

        'pages/railways/models',
        'pages/railways/controllers',

        'pages/calculators/models',
        'pages/calculators/controllers',

        'pages/geolocation/models',
        'pages/geolocation/controllers',

        'pages/downloads/models',
        'pages/downloads/controllers',

        'pages/geophysics/models',
        'pages/geophysics/controllers',

        'pages/seismic/models',
        'pages/seismic/controllers',

        'pages/users/models',
        'pages/users/tests',
        'pages/users/controllers',

        'pages/tests/models',
        'pages/tests/controllers',

        'pages/geographics/models',
        'pages/geographics/controllers',

        'pages/mapCreator/models',
        'pages/mapCreator/controllers',

        'pages/vector-best/models',
        'pages/vector-best/controllers',
        'pages/vector-best/phpTests',


    );

    //  require end($parts) . ".php";
    //echo "<br>" . "Автолоад " . "<br>";
    foreach ($folders as $path) {
        $parts = explode('\\', $className); //DIRECTORY_SEPARATOR

        $file_name = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$path.DIRECTORY_SEPARATOR.end($parts).'.php';
        //echo $file_name. "<br>";
        // $file_name =  . $value . DIRECTORY_SEPARATOR . end($parts) . '.php';
        if (is_file($file_name)) {
            require_once $file_name;
            //  A\Debug();

            //  echo "<br>"."Подключен: " . $file_name;
        }
    }

    /*
        $file_name = __DIR__ . DIRECTORY_SEPARATOR . $value . DIRECTORY_SEPARATOR . end($parts) . '.php';

        if (file_exists($file_name)) {
            require_once $file_name;
            //   echo "Подключен: " . $file_name . "<br>";
        }
    */
}
