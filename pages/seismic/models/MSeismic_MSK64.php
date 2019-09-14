<?php

namespace seismic\models;

use Application as A;
use Application\Models as M;
use Application\Models\Databases as DB;

class MSeismic_MSK64 extends M\Model_base
{


    static function getMSK64($townID)
    {

        $data = new TTable_seismicMSK();
        $rows = DB\ORM::findRows("TSeicmic", "ID = '{$townID}'");
        $row = $rows[0];

        $region = $row[0];
        $town = $row[1];

        $data->OSR2015_A = $row[2];
        $data->OSR2015_B = $row[3];
        $data->OSR2015_C = $row[4];


        // A\Debug::print_array("ColdSeasonData", $data);

        return $data;
    }




}