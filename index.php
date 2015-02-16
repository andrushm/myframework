<?php

define('DS','/');
include_once('lib'.DS.'Core'.DS.'config.php');

class RouterFactory
{
    public static function build($controller)
    {
        $class = ucfirst($controller).'Controller';
        include('controller'.DS.$class.'.php');
        if (class_exists($class)) {
            return new $class();
        } else {
            throw new \Exception("Controller '$class' not found!!!");
        }
    }
}

class App
{

//    public function __construct(){
//
//    }

    public function run(){

        $url = $_SERVER['REQUEST_URI'].'/';
        $url_param = array();
        preg_match_all('([^\/]+)', $url, $url_param); // ([^\/]+)  ([*/]\w+)
        $url_param = $url_param[0];

        $controller = $url_param[0];
//        $action = $url_param[1];
        $action = (empty($url_param[1])? 'index' : $url_param[1]);
        $run = RouterFactory::build($controller);
        $run->{$action}();

    }

}


$app = new App();
$app->run();
exit;


?>