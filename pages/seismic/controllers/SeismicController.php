<?php


namespace Application\Controllers;

use Application\Models\Databases as DB;
use Application\Debug;
use Application as A;
use seismic\models as M;
use Util\geo\KML;

class SeismicController extends BaseController
{

    public function actionIndex()
    {
        $regions = M\MTowns::getRegions();
        $this->models['regions'] = $regions;
        $this->render("pages/seismic/views/#VSeismic.php");

    }

    public function actionView($ID)
    {

        $town = M\MTowns::getTownsByID($ID);
        $this->models['town'] = $town;
        $this->models['seismic'] = M\MSeismic_MSK64::getMSK64($ID);
        $this->render("pages/seismic/views/VSeismicReport.php");
    }

    public function actionVAllEarthquakes()
    {
        $this->render("pages/seismic/views/VAllEarthquakes.php");
    }

    public function actionGetAllEarthquakes()
    {
        /*
         if (isset($_POST["params"])) {
             $params = $_POST["params"];
         }
         else{
             $params = '';
         }
        */
        $params = array();
        $params = $_POST["params"];

        $rangeCoord = array();

        $minLat = (isset($params['minLat'])) ? $params['minLat'] : '34.06';
        $maxLat = (isset($params['maxLat'])) ? $params['maxLat'] : '87.5';
        $minLong = (isset($params['minLong'])) ? $params['minLat'] : '-179';
        $maxLong = (isset($params['maxLong'])) ? $params['maxLong'] : '186.14';

        $rangeCoord['minLat'] = "34.06";
        $rangeCoord['maxLat'] = "87.5";
        $rangeCoord['minLong'] = "-179";
        $rangeCoord['maxLong'] = "186.14";



        // $this->models['rangeCoord'] = $rangeCoord;

        $sql_body = "select * from TAllEarthquakes
       where latitude > $minLat and latitude < $maxLat and longitude > $minLong and longitude < $maxLong; ";

        // $sql_body = "select * from TAllEarthquakes";

        $Earthquakes = DB\ORM::sqlQuery($sql_body);

        $db_response = DB\ORM::VAllEarthquakesQuery();
       // $columnHeaders = A\Util::getColumnHeaders("VAllEarthquakes");


        $this->render("pages/seismic/views/VAllEarthquakes.php");
    }

    public function actionExportEarthquakes2Kml()
    {
        $fileName = "pages/admin/resource/downloads/AllEarthquakes.kml";
        M\MEarthquakes::exportEarthquakes2Kml($fileName, 48, 55, 100, 130);
        A\Util::downloadFile($fileName);
    }


}

?>
