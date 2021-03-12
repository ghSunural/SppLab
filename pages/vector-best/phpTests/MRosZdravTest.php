<?php


namespace Application;

use PHPUnit\Framework\TestCase;
use vbest\models as M;

require "core/autoload.php";
require "core/Model_base.php";
require "core/Debug.php";
require "core/config.php";
require "pages/vector-best/models/MRosZdrav.php";

class MRosZdravTest extends TestCase
{

    /**
     * @test
     */
    public function testCompareData()
    {

        $expected = true;
        $this->assertSame(M\MRosZdrav::compareData(), $expected);

    }

    /**
     * @dataProvider JsonFiles
     */
    public function JsonFiles()
    {
        return [
            ['Малахов', false],
            ['Malakhov', true],
            ['Малахов11', false],
            [' Малахов', false],
            ['111', false],
            ['', false]
        ];
    }

}
