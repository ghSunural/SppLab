<?php

namespace Application\Controllers;
use Application as A;

class RailwaysController extends BaseController
{
    public function actionIndex()
    {
        A\Resolver::isAllowedFor('UW');
        $this->render('pages/railways/views/#VRailways.php');
    }

    public function actionView($ID)
    {
    }
}
