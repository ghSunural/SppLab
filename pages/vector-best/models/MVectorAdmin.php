<?php


namespace vbest\models;

use Application\Databases\MPVector as VDB;
use Application\Models as M;
use vbest\models\MVectorBot as VB;
use Application as A;

class MVectorAdmin extends M\Model_base
{

    public static function acnCreateBaseTable()
    {
        $file = 'core/util/ErrorHandler/log.txt';
        $message = "acnAdmin1\r\n";
        file_put_contents($file, $message, FILE_APPEND | LOCK_EX);
        A\Debug::conlog('acnAdmin');
         $sourceArr = A\TestsSets::getTestSet('suite_full_source')['data'];
        //$sourceArr = A\TestsSets::getTestSet('source_checkadd');

        // A\Debug::print_array($sourceArr);
        $rows = VB::wrap2MedicalDevices($sourceArr);
        // A\Debug::print_array($rows);

        foreach ($rows as $medicalDevice) {
            //A\Debug::conlog($medicalDevice);
            VDB::create($medicalDevice);
        }

    }

    public static function acnShowBaseTable()
    {


    }




    public static function test()
    {



    }


}