<?php

namespace seismic\models;

use Application as A;
use Application\Databases as DB;
use Application\Models as M;

class MSeismic_MSK64 extends M\Model_base
{
    public static function getMSK64($townID)
    {
        $data = new TTable_seismicMSK();
        $rows = DB\ORM::findRows(DB\DBManager::$DB1, 'TSeismic', "ID = '{$townID}'");
        $row = $rows[0];

        $region = $row[0];
        $town = $row[1];

        $data->OSR_A = $row[2];
        $data->OSR_B = $row[3];
        $data->OSR_C = $row[4];

        return $data;
    }
}
