<?php

namespace Application\Controllers;

use Application as A;
use climate\models as M;

class SiteController extends BaseController
{

    //$this - этот экземпляр контроллера
    public function actionIndex()
    {
        $this->render("views/site/site_view.php");
    }

}

?>