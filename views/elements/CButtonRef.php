<?php

namespace Application\Views;

class CButtonRef
{
    private $form_action;
    private $form_method;

    private $button_name;
    private $button_title;
    private $button_value;
    private $button_css_class;

    private $control_as_html;

    public function __construct($form_action, $form_method,
                                $button_css_class,
                                $button_name,
                                $button_title, $button_value)
    {
        $this->control_as_html
            = <<< EOL
            <form  action = "{$form_action}" method="{$form_method}">
                 <button 
                     class="{$button_css_class}" 
                     name="{$button_name}" 
                     type="submit" 
                     value="{$button_value}">{$button_title}            
                </button>
               </form>    
EOL;
    }

    public function getControl()
    {
        return $this->control_as_html;
    }
}
