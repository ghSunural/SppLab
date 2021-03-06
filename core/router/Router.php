<?php

namespace Application;

use Application as A;
use PHPUnit\Framework\Warning;
use Throwable;

class Router
{
    private $namespace = 'Application\\Controllers\\';
    private $routes;

    public function __construct()
    {
        //список маршрутов
        //A\config::SITE_ROOT() .
        $this->routes = require 'core/router/routesList.php';
    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        // try {
        // Получить строку запроса
        $uri = $this->getURI();

        // Проверить наличие такого запроса в routesList.php
        foreach ($this->routes as $uriPattern => $path) {

            /*
             Нарпример:
            uri seismic/1
            ему соответствует:
            - uriPattern seismic/([0-9]+), что является ключом
            для path SeismicController/actionView/$1
             */

            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу.
                //preg_replace — Выполняет поиск и замену по регулярному выражению
                //preg_replace ($pattern , $replacement , $subject)
                //uri заменяется на path если uri похожа на uriPattern
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                Debug::print_var('$internalRoute', $internalRoute);

                // Определить контроллер, action, параметры

                $segments = explode('/', $internalRoute);
                print_r($segments);


                $controllerName = array_shift($segments);
                $controllerName = ($this->namespace) . ucfirst($controllerName);

                $actionName = ucfirst(array_shift($segments));

                $parameters = $segments;

                // Создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName();

                //   if(method_exists($controllerObject, $actionName)){
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                //  $controllerObject->actionName($parameters);
                // }
                //else{
                //    require "core/base_views/404_NotFound.html";
                //  header("Location: /");
                // }


                // Вызываем функцию foobar() с 2 аргументами
                // call_user_func_array("foobar", array("one", "two"));

                // Вызываем метод $foo->bar() с 2 аргументами
                // $foo = new foo;
                // call_user_func_array(array($foo, "bar"), array("three", "four"));

                //должен прекратить поиск если $result != null
                /* if ($result != null) {
                     break;
                 }
                */

                //должен прекратить поиск если $result != null
                if ($controllerObject != null) {
                    break;
                }
            }
        }
    }

    /**
     * find controller.
     *
     * @param string $none
     *
     * @return void_none
     */
    /*
    public function run()
    {
        //1. получить строку запроса
        $uri = $this->getURI();

        A\Debug::print_var('УРИ', $uri);

        //2. Проверить наличие запроса в Листе маршрутов $routes
        $route = $this->findRouteAtRoutesList($uri, $this->routes);

        //3. Распарсить - получить имнена классов контроллеров и action с параметрами
        $route_as_array = $this->parseInnerPath($route);

        $controllerClassName = $route_as_array['ctrl'];
        Debug::print_var("Контроллер", $controllerClassName);

        $action = $route_as_array['action'];
        Debug::print_var("Экшн", $action);

        $params = $route_as_array['params'];

        Debug::print_array($params, "Параметры");


        //4. Подлючить соответствеющий класс контроллера
        // создать его экземпляр и вызвать метод action
        $controllerClassName = ($this->namespace) . $controllerClassName;

        $controller = new $controllerClassName;


        //call_user_func_array — Вызывает callback-функцию с массивом параметров
        //$result = $controller->$action($params);
        call_user_func_array(array($controller, $action), $params);

    }

    private function getURI()
    {
        //ЗАПРОС
        /*
        $uri = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        if (!empty($uri)) {
            //c обрезанными /
            return trim($uri, '/');
        }

        return '';

        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }



    }

    private function findRouteAtRoutesList($uri, $routesList)
    {
        foreach ($routesList as $UriPattern => $path) {

            if (preg_match("~$UriPattern~", $uri)) {
                //заменить внутренний адрес с паттерна на соответствующий путь из листа
                //во всем uri

                $innerPath = preg_replace("~UriPattern~", $uri, $path);
                //$innerPath = preg_replace("~UriPattern~", $path, $uri);

                return $innerPath;
            }
        }

        // return "";
    }

    private function parseInnerPath($innerPath)
    {
        //распарсить на контроллер экшен и параметры
        $route_as_array = array();

        $partsArr = explode('/', $innerPath);

        //алиас контроллера - первый до /
        $ctrlName = array_shift($partsArr);
        $route_as_array['ctrl'] = $ctrlName;
        //суффикс ."Controller"
        //потом action
        $action = array_shift($partsArr);
        //префикс "action".
        $route_as_array['action'] = ucfirst($action);

        //остатки - параметры для action
        $route_as_array['params'] = $partsArr;

        return $route_as_array;
    }
      */
}
