<?php

namespace Application\Controllers;

class CalculatorController extends BaseController
{

    public function actionIndex()
    {

        $this->render("views/calculators/#VCalculators.php");
    }

    public function actionNum2str()
    {
        $this->render("views/calculators/VCalculatorsNum2str.php");
    }

    public function actionNum2strNum($num)
    {
        $this->render("views/calculators/VCalculatorsNum2str.php");
    }

}

?>
