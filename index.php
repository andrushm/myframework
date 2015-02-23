<?php
define('DS','/');
define ("APP_PATH", "/srv/www/myframework/htdocs/");

require APP_PATH . '/lib/Twig/Autoloader.php';
Twig_Autoloader::Register();

spl_autoload_register(function ($className) {

    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace); // . DIRECTORY_SEPARATOR;
    }
//    var_dump($namespace);
    $fileName = $fileName.'.php'; //str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    var_dump($fileName); //die;
    require $fileName;

});

use lib\Core\Config\Config;

class RouterFactory
{
    public static function build($controller)
    {
        $class = ucfirst($controller).'Controller';
//        var_dump($class);die;
        //require('controller'.DS.$class.'.php');
//        if (class_exists($class)) {
            return new $class();
//        } else {
//            throw new \Exception("Controller '$class' not found!!!");
//        }
    }
}



class App
{

//    public function __construct(){
//
//    }

    public function run(){
        $config = new Config();
        $url = $_SERVER['REQUEST_URI'].'/';
        $locale = $config->locale;

//        var_dump($_SERVER);die;
        $url_param = array();
        preg_match_all('([^\/]+)', $url, $url_param); // ([^\/]+)  ([*/]\w+)
        $url_param = $url_param[0];
        var_dump($url_param[0]);
        if ((!empty($locale)) && ($url_param[0] != $config->locale)){
            $url_locale = strstr($_SERVER['SCRIPT_URI'], $_SERVER['SCRIPT_URL'], true);
            $url_locale .= DS.$locale.$_SERVER['SCRIPT_URL'];
            $this->redirect($url_locale);
        }


        $controller = $url_param[1]; //.'Controller';
        if (!empty($controller)) {
            $controller .= 'Controller';
            $action = (empty($url_param[2]) ? 'index' : $url_param[2]);
            $cont = 'Controller\\' . $controller . '\\' . $controller;
            // var_dump($cont); die;
            $run = new $cont();
            $run->{$action}();
        } else {
//            $url_redirect = ;
            $this->redirect($config->hostname.DS.$locale.DS.$config->controller);
        }
    }

    public function redirect($url){
        header('Location: ' . $url); //, true, 301);

        exit();
    }

}

$app = new App();
$app->run();
exit;

?>