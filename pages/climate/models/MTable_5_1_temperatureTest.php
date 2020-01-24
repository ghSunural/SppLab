<?php

namespace climate\models;

use PHPUnit_Framework_TestCase;

class MTable_5_1_temperatureTest extends PHPUnit_Framework_TestCase
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
