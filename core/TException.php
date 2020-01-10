<?php

namespace Application;

use Exception;

class TException extends Exception
{
/*
    private $message_error;

    public function __construct($message_error)
    {
        $this->message_error = $message_error;
    }

    public function getMessage()
    {

        return $this->message_error;
    }
*/
}


function handle_error($user_error_message, $system_error_message)
{
    header("Location: " . SITE_URL . "scripts/show_error.php?" .
        "error_message={$user_error_message}&" .
        "system_error_message={$system_error_message}");
}

?>