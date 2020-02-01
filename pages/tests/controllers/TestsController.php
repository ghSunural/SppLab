<?php

namespace Application\Controllers;

class TestsController extends BaseController
{
    public function actionIndex()
    {
        //$var = ::get;
        // $this->models['var'] = $var;
        $this->render('pages/tests/views/#VTests.php');
    }

    public function actionView($ID)
    {
        //$var = ::getBy($ID);
        //$this->models['var'] = $var;

        $this->render('pages/tests/views/.php');
    }

    public function actionShowEmpty()
    {
        //$var = ::getBy($ID);
        //$this->models['var'] = $var;

        $this->render('pages/tests/views/EmptyPage.php');
    }
}
