<?php

namespace Application\Controllers;

use calculator\models as M;

class CalculatorController extends BaseController
{
    public function actionIndex()
    {
        $this->render('pages/calculators/views/#VCalculators.php');
    }

    public function actionNum2str()
    {
        $this->render('pages/calculators/views/VCalculatorsNum2str.php');
    }

    public function actionNum2strNum()
    {
        if (isset($_POST['number'])) {
            $num = $_POST['number'];
        } else {
            $num = '';
        }

        if ($num != '') {
            $result = M\MCalculators::num2str($num);
            $this->models['num'] = $num;
            $this->models['result'] = $result;
        } else {
            $this->models['num'] = '';
            $this->models['result'] = '';
        }

        $this->render('pages/calculators/views/VCalculatorsNum2str.php');
    }

    public function actionConverterKML()
    {
        $this->render('pages/calculators/views/VConverterGeo.php');
    }

    public function actionPhotoGeo()
    {
        $this->render('pages/calculators/views/VPhotoGps.php');
    }


}
