<?php

require_once 'PHPUnit/Autoload.php';
require_once 'MyClass.php';

class MyClassTest extends PHPUnit_Framework_TestCase
{

    /*
    public function testPower()
    {
        $api = Mockery::mock('api');
        $my = new MyClass();
        $this->assertSame(8, $my->power(2, 3));
    }
    */

    public function testTeststring()
    {

        $api = "C:/xampp/php/pear/PHPUnit/TextUI/Command.php";
        $my = new MyClass();
        $this->assertTrue("hello test" === $my->teststring());
    }
}
