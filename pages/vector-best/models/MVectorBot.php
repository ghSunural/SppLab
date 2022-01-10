<?php

namespace vbest\models;

//require 'core/autoload.php';

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

        echo 'inspect enterprise_code: ' . $enterprise_code . '<br>';
        // $enterprise_name_query = VDB::readEnterprise($enterprise_code)['query'];


        /*
        $options = [
            "enterprise_name_query" => $enterprise_name_query,
            "count" => 1000
        ];*/

        $query_body = VDB::readEnterprise($enterprise_code)['query_body'];

        $json = Http::getJsonData_RZN($query_body);

        //$json = Http::getJsonData_RZN_1($options);
        $sourceArr = json_decode($json, true, 10, JSON_OBJECT_AS_ARRAY);

        $accArr = self::transformIntoAccos($sourceArr);
        $respKeys = array_keys($accArr);

        $existsKeys = VDB::readExistsKeys(["enterprise_code" => $enterprise_code]);

        $addedKeys = array_diff($respKeys, $existsKeys);

        //НЕ СТИРАТЬ  - МОЖЕТ ПРИГОДИТЬСЯ
        // $removedKeys = array_diff($existsKeys, $respKeys);


        $addedRows = [];
        foreach ($addedKeys as $key) {
            $addedRows[$key] = $accArr[$key];
        }
        /*   A\Debug::print_array($addedKeys, "ДОБАВЛЕННЫЕ КЛЮЧИ");
           A\Debug::print_array($addedRows, "ДОБАВЛЕННЫЕ ЗАПИСИ");
           A\Debug::print_array($respKeys, "ПОЛУЧЕННЫЕ КЛЮЧИ");
           A\Debug::print_array($existsKeys, "СУЩЕСТВУЮЩИЕ КЛЮЧИ");
           A\Debug::print_array($removedKeys, "УДАЛЕННЫЕ КЛЮЧИ");*/
        // echo $a = (empty($addedKeys)) ? ("addedKeys пуст <br>") : ("addedKeys что-то есть <br>");
        //   echo $r = (empty($removedKeys)) ? ("removedKeys пуст <br>") : ("removedKeys что-то есть <br>");
        $addedMedicalDevices = [];

        if (!empty($addedKeys)) {
            $addedMedicalDevices = VB::wrap2MedicalDevices($addedRows);
            VB::log($addedRows);
            VB::sendMail($addedRows, $enterprise_code);
        }

        foreach ($addedMedicalDevices as $device) {
            // echo "<br> ДОБАВЛЕНИЕ В БАЗУ";
            VDB::create($enterprise_code, $device);
        }

        // A\Debug::print_array($MedicalDevices, "MedicalDevices");


        return [
            /*    "enterprise" => "",
                "addedRecordsCount" => count($addedKeys),
                "addedRecords" => $addedMedicalDevices,
                "removedRecordsCount" => count($removedKeys),
                "removedRecords" => "",
                "modifiedRecordsCount" => "",
                "modifiedRecords" => "",*/
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


    public static function sendMail($addedKeys, $enterprise_code)
    {

        // $to= "ysunural@yandex.ru" ;
        $to = "ysunural@yandex.ru, malakhanna@yandex.ru, info@vbural.com";
        $enterprise = VDB::readEnterprise($enterprise_code)['title'];
        $subject = '=?UTF-8?B?' . base64_encode('Реестр МИ (' . $enterprise . ')') . '?=';


        // <p><pre>'. print_r($addedKeys, true).'</pre></p>

        $message = '
<html>
    <head>
        <title>Новые РУ МИ</title>
    </head>
    <p>
        <p>Обнаружены новые записи в реестре медицинских изделий</p>     
        <p>Организация-заявитель: <b>' .$enterprise. '<b></p>        
        <p>Всего: <b>' . count($addedKeys) . ' зап.<b></p>
        <a>Для получения подробной информации перейдите по  <a href="https://lab.sppural.ru/mdbot">ссылке</a></p>        
        <p>Дата: ' . date('d.m.Y H:i:s') . '</p>
    </body>
</html>';


        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: =?UTF-8?B?" . base64_encode('MD-BOT') . "?= <notify@sppural.ru>\r\n";

        mail($to, $subject, $message, $headers);
    }


    public static function log($array)
    {
        $log = date('Y-m-d H:i:s') . ' ' . print_r($array, true);

        file_put_contents('pages/vector-best/models/log.txt', $log . PHP_EOL, FILE_APPEND);
    }


}

?>