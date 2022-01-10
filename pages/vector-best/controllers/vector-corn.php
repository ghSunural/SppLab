<?php

$dir = "/usr/share/nginx/html/";

require $dir . "core/autoload.php";
require $dir . "core/base_controllers/BaseController.php";
require $dir . "core/Model_base.php";
require $dir . "pages/vector-best/models/MHttp.php";
require $dir . "core/util/DB/DBManager.php";
require $dir . "core/util/DB/TDataBase.php";
require $dir . "core/util/DB/db_vector_consts.php";
require $dir . "pages/vector-best/models/MPVector.php";
require $dir . "pages/vector-best/models/MVectorBot.php";
require $dir . "pages/vector-best/models/TMedicalDevice.php";

require $dir . "pages/vector-best/controllers/VectorBestCntr.php";

//use Application\Databases\MPVector as VDB;
//use vbest\models\MVectorBot as VB;


echo "start \n";

Application\Databases\DBManager::initDBs();
Application\Controllers\VectorBestCntr::acnDoInspection();
Application\Controllers\VectorBestCntr::acnUpdateRegCertificateHrefs();

/*
$enterprises = VDB::readAllEnterprises();
// A\Debug::print_array($enterprises);
//VB::inspect('0_');

foreach ($enterprises as $enterprise) {
    $code = $enterprise['code'];
    VB::inspect($code);
}
*/


echo "end \n";