<?php

namespace climate\models;

use Application as A;
use Application\Models as M;
use Application\Models\Databases as DB;


class MTable_5_1_temperature extends M\Model_base
{


    static function getTemperature($townID)
    {

        $data = new TTable_5_1_temperature();
        $rows = DB\ORM::findRows("VTemperature", "ID_города = '{$townID}'");
        $row = $rows[0];

        $region = $row[0];
        $town = $row[1];
        $withStar = $row[2];

        for ($i = 0; $i < 12; $i++) {

            array_push($data->temperature_by_month, $row[$i + 4]);
        }
        //A\Debug::print_array($data->temperature_by_month);

        $data->temperature_year = $row[16];

        //A\Debug::print_var("", $data->temperature_year);


        return $data;
    }


    public static function getAbsSumNegative($numbers = array())
    {
        $result = 0;

        foreach ($numbers as $val) {
            if ($val < 0) {
                $result += $val;
            }
        }

        return abs($result);
    }


    public static function getFreezingDepth($factor, $AbsSumNegative)
    {
        return round($factor * sqrt($AbsSumNegative), 2);
    }

}

?>