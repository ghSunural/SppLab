<?php

namespace Application\Controllers;

class RailwaysController extends BaseController
{
    public function actionIndex()
    {
        $this->render('pages/railways/views/#VRailways.php');
    }

    public function actionView($ID)
    {
    }
}
