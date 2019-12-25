<?php


namespace Application\Controllers;

use Application as A;
use downloads\models as M;

class DownloadController extends BaseController
{

    public function actionIndex()
    {
        $user_error_message = "";
        $system_error_message = "";
        A\Util::handle_error($user_error_message, $system_error_message);
      //  $this->render("pages/downloads/views/#VDownloads.php");
    }

    public function actionGetFile($filename)
    {
        $fileList = require("core/base_controllers/downloadsList.php");
        $fileName = $fileList[$filename];

        A\Util::downloadFile($fileName);
    }
}

?>
