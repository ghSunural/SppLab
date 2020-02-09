<?php

namespace Application;

use Error;
use Throwable;

class TError extends Error
{
    private $user_message_error;
    private $system_message_error;

    public function __construct($user_message_error)
    {
        $this->user_message_error = $user_message_error;
        $this->system_message_error = $this->getMessage();
    }

    /**
     * @param mixed $user_message_error
     */
    public function setUserMessage($user_message_error)
    {
        $this->user_message_error = $user_message_error;
    }

    public function getUserMessage()
    {
        return $this->user_message_error; //basename(debug_print_backtrace()) .$this->user_message_error;
    }

    public function getSystemMessage()
    {

      return $this->system_message_error;
       // return  $this->system_message_error;
        // //basename(debug_print_backtrace()) .$this->user_message_error;
    }
}
