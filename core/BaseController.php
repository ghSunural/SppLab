<?php

namespace Application\Controllers;

use user\models as M;
use Application\Views as V;

class BaseController
{

    public $models = array();
    public $views = array();

    public static function checkAdmin()
    {
        //Проверка регистрации, если нет - на страницу регистрации
        $userId = M\TUser::checkLogged();
        $user = M\TUser::getById($userId);

        if($user->role ==='admin'){//==
            return true;
        }
        die("Доступ закрыт");
    }

    public function render($view)
    {

        require $view;
    }

}

?>