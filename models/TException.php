<?php

namespace Application;

class TException
{

    private $message_error;

    public function get_message()
    {

        return $this->message_error;
    }
}


function handle_error($user_error_message, $system_error_message)
{
    header("Location: " . SITE_URL . "scripts/show_error.php?" .
        "error_message={$user_error_message}&" .
        "system_error_message={$system_error_message}");
}

?>