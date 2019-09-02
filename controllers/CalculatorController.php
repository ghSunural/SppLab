<?php

namespace Application\Controllers;

use calculators\models as M;

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
        $rusult = M\MCalculators::num2str($num);
        $this->models['$rusult'] = $rusult;
        $this->render("views/calculators/VCalculatorsNum2str.php");
    }

}

?>
