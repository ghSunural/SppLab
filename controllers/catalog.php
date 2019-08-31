<?php

namespace Application\Controllers;


class catalog
{

    public function _construct($view_file)
    {
        $this->view = file_get_contents($view_file);
    }


}


?>
