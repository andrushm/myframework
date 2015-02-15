<?php
//die('ter');
define('DS','\\');
class RouterFactory
{
    public static function build($controller)
    {
        $class = ucfirst($controller).'Controller';
        include('controller'.DS.$class.'.php');
        if (class_exists($class)) {
            return new $class();
        } else {
            throw new \Exception("Class epsent!!!");
        }
    }
}

class App
{

//    public function __construct(){
//
//    }

    public function run(){
//        var_dump($url_param);
//        die('die');
        $url = $_SERVER['REQUEST_URI'].'/';
        $url_param = array();
        preg_match_all('([^\/]+)', $url, $url_param); // ([^\/]+)  ([*/]\w+)
        $url_param = $url_param[0];

        $controller = $url_param[1];
        $action = $url_param[2];
        $run = RouterFactory::build($controller);
        $run->{$action}();
//        var_dump($product->getRespons());
//        echo 'Controller:'.$controller.'<br>action:'.$product->{$action}();
    }

}







$app = new App();
$app->run();
exit;
//$test = new MainController();
//echo $test->getRespons();


?>