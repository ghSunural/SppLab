<?php

namespace Application;

class Util
{
//" show_error.php?.
//            SITE_URL . "views/layouts/
//перенаправление на страницу ошибки
    public static function handle_error($user_error_message, $system_error_message)
    {

        header("Location: " . config::SITE_URL() .
            "views/layouts/show_error.php?user_error_message
            ={$user_error_message}
            &system_error_message
            ={$system_error_message}");
    }

    public static function redirect()
    {


    }

    public static function get_web_path()
    {

        return $_SERVER['DOCUMENT_ROOT'];
    }


    public static function getSimpleFilesList($dirpath)
    {
        $result = array();

        $cdir = scandir($dirpath);
        foreach ($cdir as $value) {
            // если это "не точки" и не директория
            if (!in_array($value, array(".", ".."))
                && !is_dir($dirpath . DIRECTORY_SEPARATOR . $value)) {

                $result[] = $value;
            }
        }

        return $result;
    }


    /**
     * Вернёт многомерный массив, содержащий имена файлов из указанной директории
     * (содержащиеся директории будут проигнорированы)
     * + дополнительные сведения о каждом файле (в частности размер)
     *
     * @param string $dirpath - путь к диретории
     * @return array  - массив имён файлов
     */
    public static function getSimpleFilesListWithAddInfo($dirpath)
    {
        $result = array();

        $cdir = scandir($dirpath);
        $i = 0;
        foreach ($cdir as $value) {
            // если это "не точки" и не директория
            if (!in_array($value, array(".", ".."))
                && !is_dir($dirpath . DIRECTORY_SEPARATOR . $value)) {
                $result[$i]['name'] = $value;
                $result[$i]['size'] = filesize($dirpath . DIRECTORY_SEPARATOR . $value);
                $i++;
            }
        }

        return $result;
    }

}

?>