<?php

namespace Application\Controllers;

use Application\Views as V;

class BaseController
{

    public $models = array();
    public $views = array();

    public function render($view)
    {

        require $view;
    }

}

?>