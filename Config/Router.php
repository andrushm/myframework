<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 24.02.2015
 * Time: 10:14
 */
namespace Config\Router;

use lib\Core\Config\Config;

class Router {

    public $controller = null;
    public $action = null;
    public $locale = null;
    public $args = array();
    public $request = null;
    protected $config = null;

    protected $routes = array();

    public function __construct(){
        $this->config = new Config();

        $url = $_SERVER['REQUEST_URI'].'/';
        $url_param = array();
        preg_match_all('([^\/]+)', $url, $url_param); // ([^\/]+)  ([*/]\w+)
        $this->request = $url_param[0];
    }

    public function mount($route, $controller, $action){
        $this->routes[] = array('route' => $route, 'controller' => $controller, 'action' => (empty($action) ? 'index' : $action));
    }

    public function unmount($route){

    }

    public function checkLocale(){
        if ((!empty($this->locale)) && ($this->locale != $this->config->locale)){
            $url_locale = strstr($_SERVER['SCRIPT_URI'], $_SERVER['SCRIPT_URL'], true);
            $url_locale .= DS.$this->config->locale.$_SERVER['SCRIPT_URL'];
            $this->redirect($url_locale);
        }
    }

    public function checkRoute(){
        foreach($this->routes as $route){

            if ($route['route'] == $this->controller){
                $this->controller = $route['controller'];
                $this->action = $route['action'];
            }
        }
    }

    public function run(){
        $request = $this->request;
        $this->locale = $request[0]; //

        $this->checkLocale();

        $this->controller = $request[1]; //
        $this->action = (empty($url_param[2]) ? 'index' : $url_param[2]);
        unset($request[0],$request[1],$request[2]);
        $this->args = $request;

        $this->checkRoute();

        if (!empty($this->controller)) {
            $controller = $this->controller.'Controller';

            $cont = 'Controller\\' . $controller . '\\' . $controller;
            // var_dump($cont); die;
            $run = new $cont();
            $run->{$this->action}($this->args);
        } else {
//            $url_redirect = ;
            $this->redirect($this->config->hostname.DS.$this->locale.DS.$this->config->controller);
        }



    }

    public function redirect($url){
        header('Location: ' . $url); //, true, 301);

        exit();
    }
}