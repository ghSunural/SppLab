<?php

namespace Application;

use Application\Models\Databases as DB;

class Util
{
//" show_error.php?.
//            SITE_URL . "views/layouts/
//перенаправление на страницу ошибки
    public static function handle_error($user_error_message, $system_error_message)
    {
        header("Location: /core/base_views/show_error.php");



    }

    /* user_error_message
            ={$user_error_message}
            &system_error_message
            ={$system_error_message}\");
        */

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
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            // читаем файл и отправляем его пользователю
            readfile($file);
            exit;
        } else {
            echo "<br>" . "файл не найден";
        }
    }

    /**
     * двумерный массив отобразить в таблице
     *
     */



    public static function printArrayAsTable($array, $columnHeaders = NULL)
    {


        // $thead = ;
        //$tbody = ORM::sqlQuery($sqlQuery);
        // Debug::print_array($db_response);


        echo <<< EOL

         <table class="report-table" border="1" bordercolor="black" 
           style="
           width: 100%;                    
           border-collapse: collapse;
           ">
         <caption></caption>       
EOL;
        if (isset($columnHeaders)) {
            echo "<tr>";
            foreach ($columnHeaders as $cell) {
                echo "<th style='word-wrap: break-word;'>" . $cell . "</th>";
            }
            echo "</tr>";



        }
        foreach ($array as $row) {
            echo "<tr>";

            foreach ($row as $cell) {

                echo <<< EOL
 <td  width=auto align="center" style='word-wrap: break-word;'>{$cell} </td>  
EOL;

            }
            echo "</tr> ";
        }
        echo "</table> <br>";
    }





}

?>