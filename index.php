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

//use lib\Core\Config\Config;
//require('Config\\Config.php');
//class RouterFactory
//{
//    public static function build($controller)
//    {
//        $class = ucfirst($controller).'Controller';
////        var_dump($class);die;
//        //require('controller'.DS.$class.'.php');
////        if (class_exists($class)) {
//            return new $class();
////        } else {
////            throw new \Exception("Controller '$class' not found!!!");
////        }
//    }
//}



class App
{

    public function run(){
        $router = New \Config\Router\Router();

        $router->mount('andrush', 'Second', 'index');

        $router->run();
    }


}

$app = new App();
$app->run();
exit;

?>