<?php

namespace downloads\models;

use Application\Models\Model_base;
use Application as A;

class MDownloads extends Model_base
{

    public static function getFileNamesArr($root, $subfolders)
    {
        $fileNamesArr = array();

        foreach ($subfolders as $subfolder) {


            $fileNamesArr[$subfolder] = A\Util::getSimpleFilesListWithAddInfo($root . $subfolder);
            // array_push($fileNamesArr, $subfolder => A\Util::getSimpleFilesListWithAddInfo($root . $subfolder));
            //   A\Debug::print_array($fileNamesArr);
        }

        //A\Debug::print_array($fileNamesArr);
        return $fileNamesArr;
    }



}