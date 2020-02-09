<?php

namespace Application;

class Html
{
    protected $title;
    protected $styles = array();
    protected $scripts = array();

    protected $page;
    protected $head;
    protected $header;
    protected $content;
    protected $footer;
    protected $sidebar;

    public static function convertRowsArray2HtmlTable($rowsArray, $columnHeaders = null)
    {
        $tableAsHtml = <<< 'EOL'
         <table  border="1" bordercolor="black" 
           style="
                          
           border-collapse: collapse;
           ">
         <caption></caption>       
EOL;
        if (isset($columnHeaders)) {
            $tableAsHtml .= "<tr> \n";

            foreach ($columnHeaders as $cell) {
                $tableAsHtml .= "<th style='word-wrap: break-word; padding: 1px;'>".$cell."</th> \n";
            }

            $tableAsHtml .= "</tr> \n";
        }

        foreach ($rowsArray as $row) {
            if (is_array($row)) {
                // $row = Util::convertStr2Arr($row);
                // Debug::print_array($row);
                $TR = '';
                foreach ($row as $cell) {
                    $TR .= self::getTD($cell);
                }
                $tableAsHtml .= self::getTR($TR);
            } else {
                //$row = Util::convertStr2Arr($row);
                $row = (array) $row;
                // Debug::print_array($row);
                $TR = '';
                foreach ($row as $cell) {
                    $TR .= self::getTD($cell);
                }

                $tableAsHtml .= $TR;
            }
        }

        $tableAsHtml .= '</table>';

        return $tableAsHtml;
    }

    private static function getTR($TDs)
    {
        return "<tr>\n$TDs\n</tr>";
    }

    private static function getTD($cellContent)
    {
        return "\n<td width=auto align=\"center\" style=\"word-wrap: break-word;\">\n$cellContent\n </td>";
    }

    public static function convertRow2HtmlList($row, $columnHeaders = null)
    {
        $listAsHtml = <<< 'EOL'
         <table  border="1" bordercolor="black" 
           style="                          
           border-collapse: collapse;
           ">
          
EOL;

        $listAsHtml .= "</tr> \n";

        return $listAsHtml;
    }

    public function getView_UTF($UTF_code)
    {
        return '&#'.$UTF_code.';';
    }

    public static function alert($message)
    {
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    public static function getView_Head($title, $styles = array(), $scripts = array())
    {
        $styles_as_html = '';
        if (($styles)) {
            foreach ($styles as $row) {
                $html_string = "<link href=\"{$row}\" rel=\"stylesheet\">";
                $styles_as_html .= $html_string."\n";
            }
        }

        $scripts_as_html = '';
        if (($scripts)) {
            foreach ($scripts as $row) {
                $html_string = "<script type=\"text/javascript\" src=\"{$row}\" async></script>";
                $scripts_as_html .= $html_string."\n";
            }
        }

        $head = <<< EOL
        <head>
             <meta charset="utf-8">
             <title>{$title}</title>
             {$styles_as_html}
             {$scripts_as_html}  
              <link rel="shortcut icon" href="resource/site/logo/favicon.ico" type="image/x-icon">
        </head>
EOL;

        return $head;
    }
}
