<?php

namespace climate\models;

use Application as A;
use Application\Databases as DB;
use Application\Models as M;


class MTable_4_1_warmSeason extends M\Model_base
{

    static function getWarmSeasonData($townID)
    {

        $data = new TTable_4_1_warmSeason();

        $rows = DB\ORM::findRows(A\DB_connection::$link_1,"TWarmSeason", "ID = '{$townID}'");
        $row = $rows[0];

        $region = $row[0];
        $town = $row[1];
        $withStar = $row[2];

        $data->barometricPressure = $row[3];
        $data->temperature095 = $row[4];
        $data->temperature098 = $row[5];
        $data->avrTemperatureMax = $row[6];
        $data->absTemperatureMax = $row[7];
        $data->avrRange = $row[8];
        $data->relativeHumidityWarmestMonth = $row[9];
        $data->relativeHumidityWarmestMonth15 = $row[10];
        $data->precipitation = $row[11];
        $data->maxDayPrecipitation = $row[12];
        $data->wind = $row[13];
        $data->minAvrWindSpeed = $row[14];

        //A\Debug::print_array("WarmSeasonData", $data);

        return $data;
    }

}