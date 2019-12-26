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

    public static function convertRowsArray2HtmlTable($rowsArray, $columnHeaders = NULL)
    {
        $tableAsHtml = "";

        $tableAsHtml = <<< EOL

         <table class="report-table" border="1" bordercolor="black" 
           style="
           width: 100%;                    
           border-collapse: collapse;
           ">
         <caption></caption>       
EOL;

        if (isset($columnHeaders)) {

            $tableAsHtml .= "<tr>";
            foreach ($columnHeaders as $cell) {
                $tableAsHtml .="<th style='word-wrap: break-word;'>" . $cell . "</th>";
            }
            $tableAsHtml .= "</tr>";
        }

        foreach ($rowsArray as $row) {
            $tableAsHtml .= "<tr>";
            foreach ($row as $cell) {

                $tableAsHtml .= <<< EOL
 <td  width=auto align="center" style='word-wrap: break-word;'>{$cell} </td>  
EOL;
            }
            $tableAsHtml .="</tr> ";
        }
        $tableAsHtml .= "</table> <br>";
        return $tableAsHtml;
    }



    public function getView_UTF($UTF_code)
    {
        return "&#" . $UTF_code . ";";
    }


    public static function getView_Head($title, $styles = array(), $scripts = array())
    {
        $styles_as_html = "";
        if (($styles)) {

            foreach ($styles as $row) {

                $html_string = "<link href=\"{$row}\" rel=\"stylesheet\">";
                $styles_as_html .= $html_string . "\n";
            }
        }

        $scripts_as_html = "";
        if (($scripts)) {

            foreach ($scripts as $row) {
                $html_string = "<script type=\"text/javascript\" src=\"{$row}\" async></script>";
                $scripts_as_html .= $html_string . "\n";
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