<?php


namespace Application\Controllers;

use seismic\models as M;

class SeismicController extends BaseController
{

    public function actionIndex()
    {
        $regions = M\MTowns::getRegions();
        $this->models['regions'] = $regions;
        $this->render("pages/seismic/views/#VSeismic.php");
    }

    public function actionView($ID){

        $town = M\MTowns::getTownsByID($ID);
        $this->models['town'] = $town;
        // A\Debug::print_array($town);

       // $seismic= M\MSeismic_MSK64::getMSK64($ID);
        $this->models['seismic'] = M\MSeismic_MSK64::getMSK64($ID);

        //$this->views['climate'] = "views/climate/VClimateReport.php";
       // $this->render($this->views['climate']);

        $this->render("pages/seismic/views/VSeismicReport.php");
    }

}

?>
