<?php


namespace Application\Controllers;
use Application as A;
use admin\models as M;
use Application\Debug;
use Application\Databases as DB;

use PDO;

//CRUD

class AdminController extends BaseController
{

    private $view = "pages/admin/views/#VAdminPanel.php";


    public function actionIndex()
    {

        // self::checkAdmin();

        $this->render($this->view);
    }


    public function actionIndex2()
    {

        // self::checkAdmin();

        $this->render( "pages/admin/views/Admin.php");
    }

    public function actionHeaders()
    {
        // self::checkAdmin();
        $this->models['http_headers'] = M\MAdmin::getHttpHeaders();
        $this->render($this->view);
    }

    public static function  actionDump(){

        DB\DBManager::getDumpDB();
        A\Util::downloadFile('pages/admin/resource/downloads/dump');
    }


    public function actionSql()
    {

        if (isset($_POST["sql-query"])) {
            $sql_body = $_POST["sql-query"];
        } else {
            $sql_body = '';
        }

        if ($sql_body != '') {
            $db_response = DB\ORM::sqlQuery(A\DB_connection::$link_1, $sql_body, PDO::FETCH_NUM);
            $this->models['sql_body'] = $sql_body;
            $this->models['db_response'] = $db_response;


        } else {
            $this->models['sql_body'] = '';
        }

        $this->render($this->view);
    }

}

?>