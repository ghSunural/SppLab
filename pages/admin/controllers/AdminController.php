<?php

namespace Application\Controllers;

use admin\models as M;
use Application as A;
use Application\Databases as DB;

use PDO;

//CRUD

class AdminController extends BaseController
{
    private $view = 'pages/admin/views/#VAdminPanel.php';

    public function actionIndex()
    {

        // self::checkAdmin();

        $this->render($this->view);
    }

    public function actionIndex2()
    {
        $this->models['users'] = DB\MPUser::readAll(DB\DBManager::getLinkWith(DB\DBManager::$DB1));

        // self::checkAdmin();

        $this->render('pages/admin/views/Admin.php');
    }

    public function actionHeaders()
    {
        // self::checkAdmin();
        $this->models['http_headers'] = M\MAdmin::getHttpHeaders();
        $this->render($this->view);
    }

    public static function actionDump()
    {

       // $dataBase = A\DB_connection::$DBsite;
       // $link = DB\DBManager::getLinkWith(DB\DBManager::$DB1);
        DB\DBManager::getDumpDB(DB\DBManager::$DB1);
        A\Util::downloadFile('pages/admin/resource/downloads/dump');
    }

    public function actionSql()
    {
        $link = '';
        if (isset($_POST['db'])) {
            switch ($_POST['db']) {
                case 'dbsite':
                    $link = DB\DBManager::getLinkWith(DB\DBManager::$DB1);
                    break;
                case 'dbenterprise':
                    $link = DB\DBManager::getLinkWith(DB\DBManager::$DB2);
                    break;
                default:
                    $link = DB\DBManager::getLinkWith(DB\DBManager::$DB1);
                    break;
            }

            $db = $_POST['db'];
            echo $db;
        }

        if (isset($_POST['sql-query'])) {
            $sql_body = $_POST['sql-query'];
        } else {
            $sql_body = '';
        }

        if ($sql_body != '') {
            $db_response = DB\ORM::sqlQuery(DB\DBManager::$DB1, $sql_body, PDO::FETCH_NUM);
            $this->models['sql_body'] = $sql_body;
            $this->models['db_response'] = $db_response;
        } else {
            $this->models['sql_body'] = '';
        }

        $this->render($this->view);
    }
}
