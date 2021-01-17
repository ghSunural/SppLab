<?php

namespace Application\Controllers;

//use calculator\models as M;

class GeoLocationController extends BaseController
{

    public function acnConvert2geo_formats($page_description)
    {
        $this->render($page_description['view-templates'][0]);
    }

    public function acnPhotoGeo($page_description)
    {
        $this->render($page_description['view-templates'][0]);
    }

    public function acnGps($page_description)
    {
        $this->render($page_description['view-templates'][0]);
    }


}
