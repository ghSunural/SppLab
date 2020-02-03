<?php

namespace user\models;
require 'vendor/autoload.php';

class TUserTest extends PHPUnit_Framework_TestCase
{

    protected $user;
    public static $s_user;

    protected function setUp()
    {
        $this->user = TUserFactory::createEmptyUser();
    }

    public static function setUpBeforeClass() {
        self::$s_user = TUserFactory::createEmptyUser();
    }


    /**
     * @dataProvider providerNames
     */
    public function testSetFirstName($a, $b)
    {

        $result = $this->user->setFirstName($b);
        $this->assertEquals($a, $result);

    }
    public function providerNames(){
        return [
            [true, 'Александр'],
            [true, 'alexander', true],
            [false, '1'],
            [false,'_B'],
            [false,''],
            [false,'{']
        ];
    }

    public function testCheckEmail()
    {

    }

    public function testToArray()
    {

    }

    public function testCheckName()
    {

    }

    public function testAuth()
    {

    }

    public function testGetEmail()
    {

    }

    public function testVerifyPassword()
    {

    }

    public function test__toString()
    {

    }

    public function testSetPassword()
    {

    }

    public function testIsGuest()
    {

    }

    public function testGetFirstName()
    {

    }

    public function testGetRole()
    {

    }

    public function testSetLogin()
    {

    }

    public function testGetLogin()
    {

    }

    public function testIsLogged()
    {

    }

    public function testSetSurname()
    {

    }

    public function testGetSurname()
    {

    }

    public function testGetPasswordHash()
    {


    }

    public function testSetRole()
    {

    }

    public function testCheckPassword()
    {

    }
}
