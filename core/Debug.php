<?php

namespace Application;

class Debug
{
    public static function print_array($array, $caption = null)
    {
        if (is_null($caption)) {
            $caption = '';
        }

        if (config::DEBUG_MODE()) {
            echo $caption.': ';
            echo '<pre>';
            print_r($array);
            echo '</pre>';
            echo '<br>';
        }

        //debug_print_backtrace();
    }

    /**
     * @return cap;
     */
    public static function print_var($caption, $var)
    {
        if (config::DEBUG_MODE()) {
            echo '<pre>';
            echo basename(debug_print_backtrace()).' || '.$caption.': '.$var;
            //echo " || ".$caption . ": " . $var;
            //echo self::getCaller(1)." || ".$caption . ": " . $var;
            echo '</pre>';
        }

        //var_dump(debug_backtrace());
        // debug_print_backtrace();
    }

    private static function getCaller($offset = 0)
    {
        $baseOffset = 2;
        $offset += $baseOffset;
        $backtrace = debug_backtrace();
        $caller = array();
        if (isset($backtrace[$offset])) {
            $backtrace = $backtrace[$offset];
            if (isset($backtrace['class'])) {
                $caller['class'] = $backtrace['class'];
            }
            if (isset($backtrace['function'])) {
                $caller['function'] = $backtrace['function'];
            }
        }

        return $caller;
    }
}