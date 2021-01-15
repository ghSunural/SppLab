<?php

namespace Application\Controllers;

use climate\models as M;

class ClimateController extends BaseController
{
    public function actionIndex($page_description)
    {
        $this->page_description = $page_description;
        $regions = M\MTowns::getRegions();
        $this->models['regions'] = $regions;
        $this->render($page_description['view-templates'][0]);
    }

    public function actionView($page_description)
    {
        $ID = $page_description['params'][0];
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

        $page_description['title'] = $town->locality;

        $this->page_description = $page_description;
        $this->render($page_description['view-templates'][0]);
    }
}
