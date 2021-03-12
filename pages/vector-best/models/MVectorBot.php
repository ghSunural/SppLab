<?php

namespace vbest\models;

use Application as A;
use Application\Databases\MPVector as VDB;
use Application\Models as M;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use vbest\models\MHttp as Http;
use vbest\models\MVectorBot as VB;


class MVectorBot extends M\Model_base
{


    public static function inspect($enterprise_code): array
    {

        $options = [
            "enterprise_name" => "Вектор-Бест",
            "count" => 1000
        ];
        $json = Http::getJsonData_RZN($options);
        $sourceArr = json_decode($json, true, 10, JSON_OBJECT_AS_ARRAY);

        $accArr = self::transformIntoAccos($sourceArr);
        $respKeys = array_keys($accArr);

        $existsKeys = VDB::readExistsKeys(["enterprise_code" => $enterprise_code]);

        $addedKeys = array_diff($respKeys, $existsKeys);
        $removedKeys = array_diff($existsKeys, $respKeys);


        $addedRows = [];
        foreach ($addedKeys as $key) {
            $addedRows[$key] = $accArr[$key];
        }


        //   A\Debug::print_array($respKeys, "ПОЛУЧЕННЫЕ КЛЮЧИ");
       // A\Debug::print_array($existsKeys, "СУЩЕСТВУЮЩИЕ КЛЮЧИ");
         //  A\Debug::print_array($addedKeys, "ДОБАВЛЕННЫЕ КЛЮЧИ");
        /*       A\Debug::print_array($addedRows, "ДОБАВЛЕННЫЕ ЗАПИСИ");
               A\Debug::print_array($removedKeys, "УДАЛЕННЫЕ КЛЮЧИ");
               echo $a = (empty($addedKeys)) ? ("addedKeys пуст <br>") : ("addedKeys что-то есть <br>");
               echo $r = (empty($removedKeys)) ? ("removedKeys пуст <br>") : ("removedKeys что-то есть <br>");*/
        $addedMedicalDevices = [];

        if (!empty($addedKeys)) {
            $addedMedicalDevices = VB::wrap2MedicalDevices($addedRows);
        }

        foreach ($addedMedicalDevices as $device) {
           VDB::create($device);
        }


        // A\Debug::print_array($MedicalDevices, "MedicalDevices");


        return [
            "enterprise" => "",
            "addedRecordsCount" => count($addedKeys),
            "addedRecords" => $addedMedicalDevices,
            "removedRecordsCount" => count($removedKeys),
            "removedRecords" => "",
            "modifiedRecordsCount" => "",
            "modifiedRecords" => "",
        ];
    }

    public static function wrap2MedicalDevices($data_accos): array
    {

        $rows = [];


        //$template = A\TestsSets::getTestSet('template');

        foreach ($data_accos as $key => $row) {
            // array_push($rows, TMedicalDevice::parseRow($row));
            $rows[$key] = TMedicalDevice::parseRow($row);

        }

        //A\Debug::print_array($rows, "rows");
        return $rows;
    }


    public static function transformIntoAccos($sourceArr): array
    {
        $accArr = [];
        foreach ($sourceArr['data'] as $key => $value) {
            $accArr[$sourceArr["data"][$key]["DT_RowId"]] = $value;
        }

        return $accArr;
    }


    public static function saveSource2json()
    {

        $fileName = 'pages/vector-best/models/source.json';
        $content = json_encode('c');

        file_put_contents($fileName, $content);
    }


}