<?php

namespace Application\Controllers;

use user\models as M;

class BaseController
{
    public $models = array();
    public $views = array();

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

    protected function render($view, $content = '')
    {
        require $view;

      //  render(request, template_name, context=None, content_type=None, status=None, using=None)
    }

    public function acnNotFound($page_description){
        require 'core/base_views/404_NotFound.php';
    }
}
