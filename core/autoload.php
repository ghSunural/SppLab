<?php
//echo "<br>";
spl_autoload_register('autoload');

function autoload($className)
{
    $folders = array(

        "config",
        "core",
        "controllers",
        "models",

        "models/climate",

        "models/calculators",

        "models/geophysics",

        "models/users",

    );


    //  require end($parts) . ".php";
    //echo "<br>" . "Автолоад " . "<br>";
    foreach ($folders as $path) {

        $parts = explode('\\', $className); //DIRECTORY_SEPARATOR

        $file_name = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR  . $path . DIRECTORY_SEPARATOR . end($parts) . '.php';
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

?>