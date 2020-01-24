<?php

namespace Application;

use Error;
use Throwable;

class TException extends Error implements Throwable
{

    private $user_message_error;
    private $system_message_error;

    /**
     * @param mixed $user_message_error
     */
    public function setUserMessage($user_message_error)
    {
        $this->user_message_error = $user_message_error;
    }

    /**
     * @return mixed
     */
    public function getUserMessage()
    {
        return $this->user_message_error;
    }

}




?>