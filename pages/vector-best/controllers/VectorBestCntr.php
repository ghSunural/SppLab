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


    public function acnIndex($page_description)
    {

        $this->render($page_description['view-templates'][0]);
        //список предприятий рендерится js после загрузки страницы
    }


    public function acnGetInspectionResults($page_description)
    {
        //A\Debug::conlog('backend acnGetInspectionResults');
        $request_body = json_decode(file_get_contents("php://input"), true);

        $request_enterprises_codes = $request_body ["enterprises_codes"];
        // A\Debug::print_array($request_enterprises_codes, "request_enterprises_codes");

        $report = [];

        foreach ($request_enterprises_codes as $code) {


            $options = [
                "code" => $code,
                "period" => [
                    "start" => $request_body['period']['start'],
                    "end" => $request_body['period']['end'],
                ]
            ];

            // A\Debug::print_array( $options,"options");

            $enterprise_name = VDB::readEnterprise($code)['title'];
            //  echo  "<br>  enterprise_name ".$enterprise_name."<br>";
            // A\Debug::print_array($enterprise_name, $code."---------");


            $r = VDB::readChanges($options);
            // A\Debug::print_array($r);


            $report[$enterprise_name] = $r['response'];




            // $report[$enterprise_name]['count'] = $r['count'];

        }

        // A\Debug::print_array($enterprises, "репорт");

        http_response_code(200);
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($report, JSON_PRETTY_PRINT, 10);
    }


    public static function acnDoInspection()
    {
        echo "acnDoInspection \n";
        // $this->render($page_description['view-templates'][1]);

        $results = [];

        $enterprises = array_slice(VDB::readAllEnterprises(), 0);
      //  $enterprises = array_slice(VDB::readAllEnterprises(), 3);
        // A\Debug::print_array($enterprises);
        //VB::inspect('0_');

        foreach ($enterprises as $enterprise) {
            $code = $enterprise['code'];
            echo $code.'<br>';
            VB::inspect($code);
           // VB::inspect("9_");
        }

        VDB::createLogNow();

        //  header("Location: /vector-best");
        // $this->render($page_description['view-templates'][0]);


    }


    public function acnAdmin($page_description)
    {

        //Adm::acnCreateBaseTable();
        //Adm::test();
    }

    public function acnGetEnterprisesList()
    {
        $enterprises = VDB::readAllEnterprises();
        http_response_code(200);
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($enterprises, JSON_PRETTY_PRINT, 10);
    }

    public static function acnUpdateRegCertificateHrefs()
    {

      echo("acnUpdateRegCertificateHref \n");

        // $register_id_uniq_arr = VDB::readRegisterId();

        $DT_RowIds_arr = VDB::read_DT_RowIds();


        //A\Debug::print_array($DT_RowIds_arr);
        // echo "$DT_RowIds_arr[0] <br>";
        //echo Http::getRegCertificateHref($DT_RowIds_arr[0]);

        foreach ($DT_RowIds_arr as $dt) {
          //  echo "$dt <br>";
            $href = Http::getRegCertificateHref($dt);
            VDB::updateHref($dt, $href);
        }


        // Http::getRegCertificateHref($register_id_uniq);
    }


    public function acnGetLastUpdate()
    {

        $lastUpdate_date['date'] = VDB::readLastUpdate()[0];

        // A\Debug::print_array($lastUpdate_date);

        http_response_code(200);
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($lastUpdate_date, JSON_PRETTY_PRINT, 10);
    }


    public function acnMail($page_description)
    {
      //  $addedKeys = ['fff', 'ggg'];
     // VB::sendMail($addedKeys);
     // VB::log($addedKeys);
    }
}