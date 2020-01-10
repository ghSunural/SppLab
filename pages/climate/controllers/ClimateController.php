<?php


namespace Application\Controllers;

use climate\models as M;

class ClimateController extends BaseController
{

    public function actionIndex()
    {
        $regions = M\MTowns::getRegions();
        $this->models['regions'] = $regions;
        $this->render("pages/climate/views/#VClimate.php");
    }

    public function actionView($ID){

        $town = M\MTowns::getTownByID($ID);
        $this->models['town'] = $town;
        // A\Debug::print_array($town);

        $temperatureData = M\MTable_5_1_temperature::getTemperature($ID);
        $this->models['tempByMonth'] = $temperatureData->temperature_by_month;
        $this->models['tempYear'] = $temperatureData->temperature_year;
        $this->models['sumNegativeTemp']
            = M\MTable_5_1_temperature::getAbsSumNegative($temperatureData->temperature_by_month);

        $coldSeasonData = M\MTable_3_1_coldSeason::getColdSeasonData($ID);
        $this->models['coldSeasonData'] = $coldSeasonData;

        $warmSeasonData = M\MTable_4_1_warmSeason::getWarmSeasonData($ID);
        $this->models['warmSeasonData'] = $warmSeasonData;

        //$this->views['climate'] = "views/climate/VClimateReport.php";
       // $this->render($this->views['climate']);
        $this->render("pages/climate/views/VClimateReport.php");
    }

}

?>
