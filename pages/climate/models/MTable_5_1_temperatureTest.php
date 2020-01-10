<?php

namespace climate\models;

use Application as A;
use Application\Models as M;
use Application\Databases as DB;

use PHPUnit\Framework\TestCase;

class MTable_5_1_temperatureTest extends \PHPUnit_Framework_TestCase
{

    public function testGetAbsSumNegative()
    {
        $numbers = array(
            0 => -2,
            1 => -1,
            2 => -1,

        );
     //   $numbers[0] = -1;



        print_r($numbers);

        //array_push($numbers, );
        $result = MTable_5_1_temperature::getAbsSumNegative($numbers);

        $this->assertSame(4, $result);

    }
}
