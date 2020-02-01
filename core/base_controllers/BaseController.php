<?php

namespace Application\Controllers;

use user\models as M;

class BaseController
{
    public $models = [];
    public $views = [];

    public static function checkAdmin()
    {
        //Проверка регистрации, если нет - на страницу регистрации
        $userId = M\TUser::checkLogged();
        $user = M\TUser::getById($userId);

        if ($user->role === 'admin') {//==
            return true;
        }
        die('Доступ закрыт');
    }

    protected function render($view)
    {
        require $view;
    }
}
