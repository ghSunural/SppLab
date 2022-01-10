<?php

namespace Application\Databases;

//MP mapping
use Application as A;

use Application\Databases\MPVector as VDB;
use PDO;

use vbest\models\TMedicalDevice;
use vbest\models\MVectorBot as VB;
use Application\Models as M;
use vbest\models\MHttp as Http;

class MPVector extends M\Model_base
{

    //crud
    //create <-> insert
    public static function create($enterprise_code, $medicalDevice)
    {
        // echo "<br> create";

        // A\Debug::print_array($medicalDevice);

        $link = DBManager::getLinkWith(DBManager::$DB4);

        $ref_audited_enterprise = VDB::readEnterprise($enterprise_code)['ID'];

        $DT_RowId = $medicalDevice["DT_RowId"];
        $register_id_uniq = $medicalDevice["register_id_uniq"];
        $registration_certificate = $medicalDevice["registration_certificate"];

        $href_registration_certificate = Http::getRegCertificateHref($DT_RowId);
        // $href_registration_certificate = "";

        $registration_date = $medicalDevice["registration_date"];
        $validity_period = $medicalDevice["validity_period"];
        $device_name = $medicalDevice["device_name"];

        $enterprise_applicant_name = $medicalDevice['enterprise']['applicant']['name'];
        $enterprise_applicant_address = $medicalDevice['enterprise']['applicant']['address'];
        $enterprise_applicant_legal_address = $medicalDevice['enterprise']['applicant']['legal_address'];

        $enterprise_maker_name = $medicalDevice['enterprise']['maker']['name'];
        $enterprise_maker_address = $medicalDevice['enterprise']['maker']['address'];
        $enterprise_maker_legal_address = $medicalDevice['enterprise']['maker']['legal_address'];

        $GRCP = $medicalDevice["GRCP"];
        $riskClass = $medicalDevice["riskClass"];
        $purpose = $medicalDevice["purpose"];
        $nomenclature = $medicalDevice["nomenclature"];
        $address = $medicalDevice["address"];
        $swap = $medicalDevice["swap"];

        //1 - added 2- removed 3 - modify
        $ref_action = 1;

        $checkDate = date('Y-m-d');
        // $checkDate = date("Y")."-".date("m")."-".(date("d") - 5);
        //  echo  $checkDate;
        $isRemoved = false;

        $tableName = "TMedicalDevices";

        $query = "INSERT IGNORE INTO {$tableName} (
                      ref_audited_enterprise,
                      DT_RowId,
                      register_id_uniq,
                      registration_certificate,
                      href_registration_certificate,
                      registration_date,
                      validity_period,
                      device_name,
                      enterprise_applicant_name,
                      enterprise_applicant_address,
                      enterprise_applicant_legal_address,
                      enterprise_maker_name,
                      enterprise_maker_address,
                      enterprise_maker_legal_address,
                      GRCP,
                      riskClass,
                      purpose,
                      nomenclature,
                      address,
                      swap,
                      ref_action,
                      checkDate,
                      isRemoved)
                   VALUES(
                      :ref_audited_enterprise,
                      :DT_RowId,
                      :register_id_uniq,
                      :registration_certificate,
                      :href_registration_certificate,
                      :registration_date,
                      :validity_period,
                      :device_name,
                      :enterprise_applicant_name,
                      :enterprise_applicant_address,
                      :enterprise_applicant_legal_address,
                      :enterprise_maker_name,
                      :enterprise_maker_address,
                      :enterprise_maker_legal_address,
                      :GRCP,
                      :riskClass,
                      :purpose,
                      :nomenclature,
                      :address,
                      :swap,
                      :ref_action,
                      :checkDate,
                      :isRemoved)";


        $stmt = $link->prepare($query);
        //,

        // posted values
        //$order_id = htmlspecialchars(strip_tags($order_id));

        // bind values

        $stmt->bindParam(':ref_audited_enterprise', $ref_audited_enterprise);
        $stmt->bindParam(':DT_RowId', $DT_RowId);
        $stmt->bindParam(':register_id_uniq', $register_id_uniq);

        $stmt->bindParam(':registration_certificate', $registration_certificate);
        $stmt->bindParam(':href_registration_certificate', $href_registration_certificate);
        $stmt->bindParam(':registration_date', $registration_date);
        $stmt->bindParam(':validity_period', $validity_period);
        $stmt->bindParam(':device_name', $device_name);
        $stmt->bindParam(':enterprise_applicant_name', $enterprise_applicant_name);
        $stmt->bindParam(':enterprise_applicant_address', $enterprise_applicant_address);
        $stmt->bindParam(':enterprise_applicant_legal_address', $enterprise_applicant_legal_address);
        $stmt->bindParam(':enterprise_maker_name', $enterprise_maker_name);
        $stmt->bindParam(':enterprise_maker_address', $enterprise_maker_address);
        $stmt->bindParam(':enterprise_maker_legal_address', $enterprise_maker_legal_address);

        $stmt->bindParam(':GRCP', $GRCP);
        $stmt->bindParam(':riskClass', $riskClass);
        $stmt->bindParam(':purpose', $purpose);
        $stmt->bindParam(':nomenclature', $nomenclature);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':swap', $swap);


        $stmt->bindParam(':ref_action', $ref_action);
        $stmt->bindParam(':checkDate', $checkDate);
        $stmt->bindParam(':isRemoved', $isRemoved);


        $stmt->execute();
    }

    //read <-> select
    public static function readAll($tableName)
    {

        $link = DBManager::getLinkWith(DBManager::$DB4);

        $query = "select * from {$tableName}";


        $stmt = $link->prepare($query);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function readExistsKeys($options = [])
    {
        $link = DBManager::getLinkWith(DBManager::$DB4);

        //  $ref_audited_enterprise = $options["enterprise_code"];
        // echo  $ref_audited_enterprise;
        //$query = "select DT_RowId from TMedicalDevices where ref_audited_enterprise = :ref_audited_enterprise";

        //  echo $query;
        $code = $options["enterprise_code"];
        $query = "select DT_RowId from VMedDev where code = :code";

        $stmt = $link->prepare($query);
        $stmt->bindParam(':code', $code);
        //  $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $columnNumber = 0;
        return $stmt->fetchAll(PDO::FETCH_COLUMN, $columnNumber);
    }


    public static function updateEntry($options = [])
    {

        $ref_audited_enterprise = $options["enterprise_code"];
        $DT_RowId = $options["entryKey"];


        //2 - modified
        $ref_action = 2;
    }

    public static function readChanges($options = [])
    {
        $link = DBManager::getLinkWith(DBManager::$DB4);

        $enterprises_code = $options["code"];
        $dstart = $options['period']['start'];
        $dend = $options['period']['end'];

        //$query = "select * from VMedDev where code = \"$enterprises_code\" and checkDate>=\"$dstart\" and checkDate<=\"$dend\"";

        $query = "select * from VMedDev where code = \"$enterprises_code\"  and str_to_date(registration_date, '%d.%m.%Y')>=\"$dstart\"and str_to_date(registration_date, '%d.%m.%Y')<=\"$dend\"";


        //   $queryCount = "select count(*) as 'count' from TMedicalDevices where ref_audited_enterprise = $enterprises_code and checkDate>=\"$dstart\" and checkDate<=\"$dend\"";
        // A\Debug::print_array($enterprise_name, $code."---------");
        $stmt = $link->prepare($query);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();;

        // A\Debug::print_array($stmt->fetchAll(), "readChanges");
        return [
            "response" => $stmt->fetchAll(),
            "count" => $stmt->rowCount()
        ];


    }


    public static function readAllEnterprises()
    {

        $link = DBManager::getLinkWith(DBManager::$DB4);

        // $query = "select * from :table";
        $query = "select * from TAuditedEnterprises";

        $stmt = $link->prepare($query);

        // $ent = "TAuditedEnterprises";

        //  $stmt->bindParam(':table', $ent);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        return $stmt->fetchAll();

    }


    public static function readEnterprise($code)
    {

        $link = DBManager::getLinkWith(DBManager::$DB4);


        $query = "select * from TAuditedEnterprises where code = \"$code\"";

        // echo $query;

        $stmt = $link->prepare($query);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        // A\Debug::print_array($stmt->fetchAll()[0], "stmt");

        //0 - так как результат - одна строка
        return $stmt->fetchAll()[0];

    }


    public static function updateHref($dt, $href)
    {

        $link = DBManager::getLinkWith(DBManager::$DB4);


        //  $query = "select title from TAuditedEnterprises where code= $code";
        // $query =  "update TMedicalDevices set href_registration_certificate =\"$href\" where DT_RowId = \"$dt\"";

        $query = "update TMedicalDevices set href_registration_certificate =\"$href\" where (DT_RowId = \"$dt\")";

        $stmt = $link->prepare($query);

        //$stmt->setFetchMode(PDO::FETCH_COLUMN, 0);
        $stmt->execute();
        //  echo "$dt <br>";
        //   echo "$href <br>";

        //return $stmt->fetchAll();

    }


    public static function ______updateHref($id)
    {

        $link = DBManager::getLinkWith(DBManager::$DB4);


        $query = "select title from TAuditedEnterprises where code= $code";


        $stmt = $link->prepare($query);

        $stmt->setFetchMode(PDO::FETCH_COLUMN, 0);
        $stmt->execute();

        return $stmt->fetchAll();

    }


    public static function read_DT_RowIds()
    {


        $link = DBManager::getLinkWith(DBManager::$DB4);


        //$query = "call sql_getDT_RowId";

        $query = "call sql_getDT_RowId_hrefnull";

        // echo $query;

        $stmt = $link->prepare($query);

        $stmt->setFetchMode(PDO::FETCH_COLUMN, 0);
        $stmt->execute();

        // A\Debug::print_array($stmt->fetchAll()[0], "stmt");

        //0 - так как результат - одна строка
        return $stmt->fetchAll();

    }


    public static function createLogNow()
    {

        $link = DBManager::getLinkWith(DBManager::$DB4);
        $query = "call sql_logNow";
        $stmt = $link->prepare($query);
        $stmt->execute();
    }


    public static function readLastUpdate()
    {

        $link = DBManager::getLinkWith(DBManager::$DB4);
        $query = "call sql_readLastUpdate";
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_COLUMN, 0);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

?>