<?php


namespace Application\Databases;

class DBManager
{

    public static function getDumpDB(){


      //  $fileName =  'pages/admin/resource/downloads/dump'
       // exec('mysqldump -uYourLogin -pYourPassword DBName > /path/to/save/fileDBName.sql');
      // ini_set();

       //ini_alter("disable_functions", "system");
        exec('mysqldump -u id10552045_malakhovav 
        -p Malakhov6503 id10552045_spp_database --single-transaction --quick > 
        pages/admin/resource/downloads/dump.sql');


    }





}