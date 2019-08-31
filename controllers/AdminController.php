<?php


namespace Application\Controllers;


class AdminController extends AdminBase
{

    private $layout = (SITE_ROOT) . "views/admin/adminPanel_view.php";
    private $views = array();

    public function actionIndex()
    {

       //self::checkAdmin();
        $this->render($this->layout);
    }

    public function render($layout)
    {
        require_once $layout;
    }


}

?>