<?php


namespace Application\Controllers;

use railways\models as M;

class RailwaysController extends BaseController
{

    public function actionIndex()
    {

        $this->render("pages/railways/views/#VRailways.php");
    }

    public function actionView($ID){

    }

}

?>
