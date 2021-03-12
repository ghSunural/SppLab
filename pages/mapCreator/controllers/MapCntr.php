<?php

namespace Application\Controllers;

//use calculator\models as M;

class MapCntr extends BaseController
{

    public function acnIndex($page_description)
    {
        $this->render($page_description['view-templates'][0]);
    }




}
