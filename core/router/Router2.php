<?php

namespace Application;


class Router2
{
    private $namespace = 'Application\\Controllers\\';
    private $routes;
    private $sitemap;
    private $uri;

    public function __construct()
    {

        $this->uri = trim($_SERVER['REQUEST_URI'], '/');
        $this->sitemap = json_decode(file_get_contents('core/sitemap.json'), true);

    }


    public function run()
    {

        foreach ($this->sitemap as $uriPattern => $page_description) {

            // var_dump($this->sitemap);
            /*  var_dump($description);
              Debug::print_var('$uri', $this->uri);
              Debug::print_var('$uriPattern', $uriPattern);
              Debug::print_var('description - controller', $description['controller']);
              Debug::print_var('description - action', $description['action']);
            */

            if (preg_match("~$uriPattern~", $this->uri)) {


                $page_description['uri'] = $this->uri;

                $controllerName = ($this->namespace) . ucfirst($page_description['controller']);
                $controllerObject = new $controllerName();
                $actionName = ($page_description['action']);
                //  Debug::print_var('controller', $controllerName);
                //  Debug::print_var('action', $actionName);
                //$str_params = preg_replace("~$uriPattern~", '_', $parsed_uri);

                $str_params = preg_replace("~$uriPattern~", '$1', $this->uri);
                //$str_params = $description['params'];

                //   Debug::print_var('$uriPattern', $uriPattern);
                //    Debug::print_var('$str_params', $str_params);
                $params = explode('/', $str_params);
                $page_description['params'] = $params;
                //$args = array($page_description);
                //Debug::print_array('$params', $params);
                //var_dump($page_description);
                $args = array();
                $args['uripattern'] = $uriPattern;

                echo '<br>';
                //$args['description'] = $page_description;
                $args = array_merge($args, $page_description);
                $args_ = array();
                array_push($args_, $args);

                //Debug::print_array('$args', $args);
                // Передаваемые в функцию параметры в виде индексированного массива.
                $result = call_user_func_array(array($controllerObject, $actionName), $args_);

                if ($controllerObject != null) {
                    break;
                }
            }

        }
    }

}
