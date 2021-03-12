<?php

namespace Application\Controllers;

class DownloadsCntr extends BaseController
{

    public function acnIndex($page_description)
    {
        $this->page_description = $page_description;
        $this->render($page_description['view-templates'][1]);
    }
}
