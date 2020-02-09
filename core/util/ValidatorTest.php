<?php

namespace Application;

use PHPUnit\Framework\TestCase;
use Exception;
use Throwable;

require 'Validator.php';

class ValidatorTest extends TestCase
{

    /**
     * @dataProvider Names
     */
    public function testIsName($name, $expected)
    {
        $this->assertSame(Validator::isName($name), $expected);
    }

    public function Names()
    {
        return [
            ['Малахов', true],
            ['Malakhov', true],
            ['Малахов11', false],
            [' Малахов', false],
            ['111', false],
            ['', false]
        ];
    }

    /**
     * @dataProvider Numbers
     */
    public function testIsNumber($number, $expected)
    {
        $this->assertSame(Validator::isNumber($number), $expected);
    }

    public function Numbers()
    {
        return [
            ['111', true],
            ['_ 111', false],
            ['111b', false],
            [' 111b', false],
            ['_', false],
            ['1v1', false]
        ];
    }

    /**
     * @dataProvider Emails
     */
    public function testIsEmail($email, $expected)
    {
        $this->assertSame(Validator::isEmail($email), $expected);
    }

    public function Emails()
    {
        return [
            ['ysunural@yandex.ru', true],
            ['русс@русс.рф', true],
            ['руссрусс.рф', false]

        ];
    }

//

    /**
     * @dataProvider Emails2
     * @expectedException ()
     */
    public function testValidEmail($email)
    {
        // return true;
        try {
           // Validator::verifyEmail($email);
            $this->assertTrue(Validator::verifyEmail($email));

           // Validator::verifyEmail($email);

        } catch (Throwable $e) {
            echo $e->getMessage();
            return;

        }
     $this->fail('Исключение не создано');

    }

    public function Emails2()
    {
        return [
            ['ysunural@yandex.ru'],
            ['русс@русс.рф'],
            ['руссрусс.рф']
        ];
    }

    /**
     * @dataProvider Phones
     */
    public function testIsPhone($phone, $expected)
    {
        $this->assertSame(Validator::isPhone($phone), $expected);
    }

    public function Phones()
    {
        return [
            ['9024098141', true],
            ['89024098141', false],
            ['буквы', false],
            ['li\t', false],
            ['', false],
        ];
    }


}
