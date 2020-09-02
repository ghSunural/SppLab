<?php

namespace Application;

use Error;
use user\models\MUsers;

class Resolver
{
    public static function isAllowedFor($lowerAccessRole)
    {
        $userRole = 1;

        if (isset($_SESSION['userRole'])) {
            $userRole = MUsers::$roles[$_SESSION['userRole']];
        }

        $lowerAccessLevel = MUsers::$roles[$lowerAccessRole];

        if (($userRole >= $lowerAccessLevel) || $lowerAccessLevel < 2) {
            return true;
        } else {

            Html::alert('Доступ запрещен');
            header('Location: https://lab.sppural.ru/sign/login');
            // require_once 'core/autoload.php';
            //throw new TError('Доступ запрещен');
            // return false;

        }

    }
}
