<?php

namespace Application\Controllers;

class DownloadsController extends BaseController
{

    public function acnIndex()
    {
        $this->render('pages/downloads/views/#DownlodsRefs.php');
    }
}
