<?php

namespace Application\Controllers;
use calculators\models as M;

class GeophysicsController extends BaseController
{

    public function actionIndex()
    {

        $this->render("pages/geophysics/views/#VGeophysics.php");
    }



}

?>