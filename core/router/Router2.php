<?php

namespace Application;


class Router2
{
    private $namespace = 'Application\\Controllers\\';
    private $routes;
    private $sitemap;
    private $uri;
    private $isFind = false;

    public function __construct()
    {

        $this->uri = trim($_SERVER['REQUEST_URI'], '/');
        $this->sitemap = json_decode(file_get_contents('core/sitemap.json'), true);

    }


    public function run()
    {

        if ($this->uri == '') {
            require('template/spplab/index.php');
            //$this->isFind = true;
            return;
        }

        foreach ($this->sitemap as $uriPattern => $page_description) {

            if (preg_match("~$uriPattern~", $this->uri)) {


                // var_dump($this->sitemap);
                /*  var_dump($description);
                  Debug::print_var('$uri', $this->uri);
                  Debug::print_var('$uriPattern', $uriPattern);
                  Debug::print_var('description - controller', $description['controller']);
                  Debug::print_var('description - action', $description['action']);
                */


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
                $args = [];
                $args['uripattern'] = $uriPattern;


                //$args['description'] = $page_description;
                $args = array_merge($args, $page_description);
                $args_ = [];
                array_push($args_, $args);

                //Debug::print_array('$args', $args);
                // Передаваемые в функцию параметры в виде индексированного массива.
                $result = call_user_func_array([$controllerObject, $actionName], $args_);

                if ($controllerObject != null) {
                    $this->isFind = true;
                    break;
                }
            }

        }

        if ($this->isFind == false) {
           //header('Location: /404NotFound');
            header('HTTP/1.1 404 Not Found');
            require('core/base_views/404_NotFound.php');
        }

    }
}

