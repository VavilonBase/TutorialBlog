<?php

namespace application\core;
use application\core\View;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct() {
        //
        $arr = require 'application/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    //Add route
    public function add($route, $params) {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    //Match route on url
    //true, if march, else false
    //if match, route params will be writed to this class    
    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $match)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    //Run match route and run controller and action
    public function run() {
        if ($this->match()) {
            $path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                }
                else {
                    View::errorCode(404);
                }
            }
            else {
                View::errorCode(404);
            }
        }
        else {
            View::errorCode(404);
        }
    }
    


}