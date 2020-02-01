<?php

namespace Application\Controllers;

use Application as A;

class SiteController extends BaseController
{
    //$this - этот экземпляр контроллера
    public function actionIndex()
    {
        $this->render('core/base_views/site_view.php');
    }

    public function actionGetFile($filename)
    {
        if (is_null($filename)) {
            $user_error_message = '';
            $system_error_message = '';
            A\Util::handle_error($user_error_message, $system_error_message);
            //  $this->render("pages/downloads/views/#VDownloads.php");
        }

        $fileList = require 'core/base_controllers/downloadsList.php';
        $fileName = $fileList[$filename];

        A\Util::downloadFile($fileName);
    }
}
