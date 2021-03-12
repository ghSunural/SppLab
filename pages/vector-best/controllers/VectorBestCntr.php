<?php

namespace Application\Controllers;

use vbest\models\CMailer as M;
use vbest\models\MVectorBot as VB;
use vbest\models\MHttp as Http;
use vbest\models\MVectorAdmin as Adm;
use Application\Databases\MPVector as VDB;
use Application as A;
use vbest\models\TMedicalDevice;


class VectorBestCntr extends BaseController
{

    /**
     * @param $page_description
     */
    public function acnIndex($page_description)
    {


        //$jsonResp = MZ::getJsonData_RZN($options);
        // echo $jsonResp;


        // MZ::compareData();
        //
        // $sourceArr = A\TestsSets::getTestSet('suite_full_source');
        //  $rows = MZ::readData($sourceArr);


        // $this->models['rows'] = $rows;
        $this->render($page_description['view-templates'][0]);
    }


    public function acnGetInspectionResults($page_description)
    {

        $request_body = json_decode(file_get_contents("php://input"), true);

        $enterprises_codes = $request_body ["enterprises_codes"];

        $report = [];
        $enterprises = [];
        $medDevs = [];

        foreach ($enterprises_codes as $code) {
            //  $response[$code] = VDB::readChanges([]);
            $options = [
                "code" => $code,
                "period" => [
                    "start" => $request_body['period']['start'],
                    "end" => $request_body['period']['end'],
                ]
            ];

            $enterprise_name = VDB::readEnterprise($code);

            $enterprises[$enterprise_name[0]] = VDB::readChanges($options);
            array_push($report, $enterprises);

        }


        $response = $report;
        //   A\Debug::print_array($medDevs);
        http_response_code(200);
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($response, JSON_PRETTY_PRINT, 10);
    }


    public function acnDoInspection($page_description)
    {

        /*

        $results = [];

        $codes = [1];

        foreach ($codes as $code) {
            $results[$code] = VB::inspect($code);
        }
        */

        //A\Debug::print_array($results, "Вектор");


        $results[0] = VB::inspect(0);

    }


    public function acnAdmin($page_description)
    {

        //Adm::acnCreateBaseTable();
        //  Adm::test();
    }


    public function acnMail($page_description)
    {
        if (isset($_POST['button_send_message'])) {
            echo 'Отправить почту';
        }
        $options =
            ['message' => 'Отчет об изменениях на сайте \r\n добавлено записей:'];
        M::sendMail($options);
    }


}