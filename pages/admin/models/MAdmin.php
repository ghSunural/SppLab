<?php

namespace admin\models;

use Application\Models\Model_base;

class MAdmin extends Model_base
{
    public static function getHttpHeaders()
    {
        return getAllHeaders();

        /* foreach (getallheaders() as $name => $value) {
             echo "$name: $value\n"."<br>";
         }
        */
    }
}
