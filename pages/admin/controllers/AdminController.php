<?php


namespace Application\Controllers;

use admin\models as M;
use Application\Debug;
use Application\Databases as DB;

//CRUD

class AdminController extends BaseController
{

    private $view = "pages/admin/views/#VAdminPanel.php";


    public function actionIndex()
    {

        // self::checkAdmin();

        $this->render($this->view);
    }

    public function actionHeaders()
    {
        // self::checkAdmin();
        $this->models['http_headers'] = M\MAdmin::getHttpHeaders();
        $this->render($this->view);
    }


    public function actionSql()
    {

        if (isset($_POST["sql-query"])) {
            $sql_body = $_POST["sql-query"];
        } else {
            $sql_body = '';
        }

        if ($sql_body != '') {
            $db_response = DB\ORM::sqlQuery($sql_body);
            $this->models['sql_body'] = $sql_body;
            $this->models['db_response'] = $db_response;


        } else {
            $this->models['sql_body'] = '';
        }

        $this->render($this->view);
    }

}

?>