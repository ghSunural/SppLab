<?php


namespace Application\Controllers;

use Application as A;
use downloads\models as M;

class DownloadController extends BaseController
{

    public function actionIndex()
    {


        $root = "resource/content/download/";

        $subfolders = array(

            'blanks',
            'SNIPS',
            'books',
            'programs',
            'examples',
            'others',
        );



       // $files = M\MDownloads::getFileNamesArr($root, $subfolders);

        $this->models['files'] = M\MDownloads::getFileNamesArr($root, $subfolders);

      //  Debug::print_array($this->models['files']);

        $this->render("pages/downloads/views/#VDownloads.php");
    }

    public function actionGetFile($filename)
    {
        //$var = ::getBy($ID);
        //$this->models['var'] = $var;
        $filename = './resource/content/download/programs/GeoSemDem_v2_E.exe';
        M\MDownloads::downloadFile($filename);
        // $this->render("views/.php");
    }

}

?>
