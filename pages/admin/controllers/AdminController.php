<?php

namespace Application\Controllers;

use admin\models as M;
use Application as A;
use Application\Databases as DB;
use Application\Databases\DBManager;


use PDO;

//CRUD

class AdminController extends BaseController
{
    private $view = 'pages/admin/views/#VAdminPanel.php';

    public function actionIndex()
    {
        A\Resolver::isAllowedFor('DEV');
        $this->render($this->view);
    }

    public function actionIndex2()
    {
        A\Resolver::isAllowedFor('DEV');
        $this->models['users'] =
            DB\MPUsers::readAll();
        $this->render('pages/admin/views/Admin.php');
    }

    public function acnShowUsers()
    {
        A\Resolver::isAllowedFor('ADM');

        //TUsers
        $arrColumnHeaders = DB\ORM::getColumnHeaders(DB\DBManager::$DB1, 'VUsers');
        //$users = DB\MPUsers::readAll();
        $sql_body = "select * from VUsers";
        $users = DB\ORM::sqlQuery(DB\DBManager::$DB1, $sql_body, PDO::FETCH_NUM);

        $this->models['arrColumnHeaders'] = $arrColumnHeaders;
        $this->models['users'] = $users;

        $this->render('pages/users/views/VUsers.php');
    }



    public function actionHeaders()
    {
        A\Resolver::isAllowedFor('DEV');
        $this->models['http_headers'] = M\MAdmin::getHttpHeaders();
        $this->render($this->view);
    }

    public function actionDump()
    {

        require "core/util/ErrorHandler/errors.html";
      //  echo "дамп";
        // $dataBase = A\DB_connection::$DBsite;
        // $link = DB\DBManager::getLinkWith(DB\DBManager::$DB1);

        //   $link = DB\DBManager::getLinkWith(DB\DBManager::$DB1);
      //  DB\DBManager::getDumpDB(DB\DBManager::$DB1);
      //  A\Util::downloadFile('pages/admin/resource/downloads/dump.sql');
    }

    public function acnErrorsLog()
    {

        require "core/util/ErrorHandler/errors.html";
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
