<?php

namespace Application;

use Error;
use Prophecy\Doubler\ClassPatch\ThrowablePatch;
use Throwable;

class TError extends Error
{
    private $user_message_error;

    public function setUserMessage($user_message_error)
    {
        $this->user_message_error = $user_message_error;
    }


    public function getUserMessage()
    {
        return $this->user_message_error; //basename(debug_print_backtrace()) .$this->user_message_error;
    }


}
