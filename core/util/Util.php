<?php

namespace Application;

class Util
{
    public static function redirect()
    {
    }

    public static function get_web_path()
    {
        return $_SERVER['DOCUMENT_ROOT'];
    }

    public static function getSimpleFilesList($dirpath)
    {
        $result = [];

        $cdir = scandir($dirpath);
        foreach ($cdir as $value) {
            // если это "не точки" и не директория
            if (!in_array($value, ['.', '..'])
                && !is_dir($dirpath.DIRECTORY_SEPARATOR.$value)) {
                $result[] = $value;
            }
        }

        return $result;
    }

    /**
     * Вернёт многомерный массив, содержащий имена файлов из указанной директории
     * (содержащиеся директории будут проигнорированы)
     * + дополнительные сведения о каждом файле (в частности размер).
     *
     * @param string $dirpath - путь к диретории
     *
     * @return array - массив имён файлов
     */
    public static function getSimpleFilesListWithAddInfo($dirpath)
    {
        $result = [];

        $cdir = scandir($dirpath);
        $i = 0;
        foreach ($cdir as $value) {
            // если это "не точки" и не директория
            if (!in_array($value, ['.', '..'])
                && !is_dir($dirpath.DIRECTORY_SEPARATOR.$value)) {
                $result[$i]['name'] = $value;
                $result[$i]['size'] = filesize($dirpath.DIRECTORY_SEPARATOR.$value);
                $i++;
            }
        }

        return $result;
    }

    public static function downloadFile($file)
    {        //echo  "<br>"."в даунлоаде";
        if (file_exists($file)) {
            // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
            // если этого не сделать файл будет читаться в память полностью!
            if (ob_get_level()) {
                ob_end_clean();
            }
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: '.filesize($file));
            // читаем файл и отправляем его пользователю
            readfile($file);
            exit;
        } else {
            echo '<br>'.'файл не найден';
        }
    }

    public static function saveAsRtf()
    {
    }

    /*
        public static function convertStr2Arr($strOrArr)
        {
    
            $arr = array();
    
            if (is_array($strOrArr)) {
                $arr = $strOrArr;
            } else {
                array_push($arr, $strOrArr);
            }
    
            return $arr;
    
    
        }
    */
}
