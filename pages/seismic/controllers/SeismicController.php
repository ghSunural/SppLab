<?php

namespace Application\Controllers;

use Application as A;
use Application\Databases as DB;
use seismic\models as M;

class SeismicController extends BaseController
{
    public function actionIndex($page_description)
    {
        // var_dump($args);
        //    echo $args['page_description']['title'];

        $this->page_description = $page_description;
        $regions = M\MTowns::getRegions();
        $this->models['regions'] = $regions;

        $this->render($page_description['view-templates'][0]);
    }

    public function actionView($page_description)
    {
        A\Resolver::isAllowedFor(1);

      // var_dump($page_description);
        //echo $page_description['title'];
        $ID = $page_description['params'][0];
        //   echo $ID;
        //* echo $page_description['title'];
        $town = M\MTowns::getTownsByID($ID);
        $this->models['town'] = $town;
        $this->models['seismic'] = M\MSeismic_MSK64::getMSK64($ID);

        $page_description['title'] = $town->locality;

        $this->page_description = $page_description;
        $this->render($page_description['view-templates'][0]);
    }

    public function actionEarthquakes($page_description)
    {
        $this->page_description = $page_description;
        $this->render($page_description['view-templates'][0]);
    }

    public function switchAction()
    {
        $params = $_POST['params'];

        $rangeCoord['minLat'] = (!empty($params['minLat'])) ? $params['minLat'] : '34.06';
        $rangeCoord['maxLat'] = (!empty($params['maxLat'])) ? $params['maxLat'] : '87.5';
        $rangeCoord['minLong'] = (!empty($params['minLong'])) ? $params['minLong'] : '-179';
        $rangeCoord['maxLong'] = (!empty($params['maxLong'])) ? $params['maxLong'] : '186.14';

        $earthquakesAsRowsArray = M\MEarthquakes::getEarthquakesAsRowsArray(
            $rangeCoord['minLat'], $rangeCoord['maxLat'],
            $rangeCoord['minLong'], $rangeCoord['maxLong']
        );

        $arrColumnHeaders = DB\ORM::getColumnHeaders(DB\DBManager::$DB1, 'VAllEarthquakes');

        $this->models['rangeCoord'] = $rangeCoord;
        $this->models['arrColumnHeaders'] = $arrColumnHeaders;
        $this->models['arrEarthquakes'] = $earthquakesAsRowsArray;

        if (isset($_POST['list'])) {
          //  echo 'list';
            $this->render('pages/seismic/views/VAllEarthquakes.php');
        } elseif (isset($_POST['export'])) {
            $fileName = 'pages/admin/resource/downloads/AllEarthquakes.kml';

            M\MEarthquakes::exportEarthquakes2Kml($fileName, $earthquakesAsRowsArray);
            A\Util::downloadFile($fileName);
        } elseif (isset($_POST['on_map'])) {
          //  echo 'on_map';
            $fileName = 'resource/content/generated/AllEarthquakes.kml';
            M\MEarthquakes::exportEarthquakes2Kml($fileName, $earthquakesAsRowsArray);
            //  echo file_get_contents('pages/admin/resource/downloads/AllEarthquakes.kml');
            $this->render('pages/seismic/views/VAllEarthquakes.php');

        //   A\Util::downloadFile($fileName);
        } else {
            echo 'error';
        }
    }
}
