<?php


namespace Application\Controllers;

use Application\Models\Databases as DB;

//CRUD

class AdminController extends BaseController
{

    private $layout = "pages/admin/views/#VAdminPanel.php";


    public function actionIndex()
    {

        // self::checkAdmin();

        $this->render($this->layout);
    }


    public function actionSql()
    {

        if (isset($_POST["sql-query"])) {
            $sql = $_POST["sql-query"];
        } else {
            $sql = '';
        }


        if ($sql != '') {
            $resultSql = DB\ORM::sqlQuery($sql);
            $this->models['resultSql'] = $resultSql;
            $this->models['sql'] =  $sql;
        } else {
            $this->models['sql'] = '';
        }

        $this->render("pages/admin/views/#VAdminPanel.php");


    }


}

?>