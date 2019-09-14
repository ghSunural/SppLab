<?php


namespace Application\Controllers;



class TemplateController extends BaseController
{

    public function actionIndex()
    {
        //$var = ::get;
        // $this->models['var'] = $var;
        $this->render("views/");
    }

    public function actionView($ID)
    {
        //$var = ::getBy($ID);
        //$this->models['var'] = $var;

        $this->render("views/.php");
    }

}

?>
