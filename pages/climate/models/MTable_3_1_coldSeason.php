<?php

namespace climate\models;

use Application as A;
use Application\Models as M;
use Application\Databases as DB;

class MTable_3_1_coldSeason extends M\Model_base
{


    static function getColdSeasonData($townID)
    {

        $data = new TTable_3_1_coldSeason();
        $rows = DB\ORM::findRows(A\DB_connection::$link_1,"TColdSeason", "ID = '{$townID}'");
        $row = $rows[0];

        $region = $row[0];
        $town = $row[1];

        $data->theColdestDay098 = $row[3];
        $data->theColdestDay092 = $row[4];
        $data->theColdestFiveDays098 = $row[5];
        $data->theColdestFiveDays092 = $row[6];
        $data->temperature094 = $row[7];
        $data->absTemperatureMin = $row[8];
        $data->avrRange = $row[9];
        $data->duration_l0 = $row[10];
        $data->avrTemp_l0 = $row[11];
        $data->duration_l8 = $row[12];
        $data->avrTemp_l8 = $row[13];
        $data->duration_l10 = $row[14];
        $data->avrTemp_l10 = $row[15];
        $data->relativeHumidityColdestMonth = $row[16];
        $data->relativeHumidityColdestMonth15 = $row[17];
        $data->precipitation = $row[18];
        $data->wind = $row[19];
        $data->maxAvrWindSpeed = $row[20];
        $data->avrWindSpeed_l8 = $row[21];

        // A\Debug::print_array("ColdSeasonData", $data);

        return $data;
    }




}