<?php

namespace Application;

class Resolver
{
    public static function isAllowedFor($lowerAccessLevel)
    {
        if ((isset($_SESSION['role']) && $_SESSION['role'] > $lowerAccessLevel)
        || $lowerAccessLevel < 2) {
            return true;
        } else {
            //  header('Location: /' );
            die('доступ запрещен');
            //  return false;
        }
        //  return false;
    }
}
