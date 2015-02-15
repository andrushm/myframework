<?php
class RouterFactory
{
    public static function build($controller)
    {
        $class = ucfirst($controller).'Controller';
        if (class_exists($class)) {
            return new $class();
        } else {
            throw new \Exception("Class epsent!!!");
        }
    }
}

class AppController
{
    public $respons = null;

    public function __construct(){

    }

    public function run(){
        $this->respons = 'respons';
        $url = $_SERVER['REQUEST_URI'].'/';
        $url_param = array();
        preg_match_all('([^\/]+)', $url, $url_param); // ([^\/]+)  ([*/]\w+)
        $url_param = $url_param[0];
        //var_dump($url_param);
        $controller = $url_param[1];
        $action = $url_param[2];
        $product = RouterFactory::build($controller);
        var_dump($product->getRespons());
        echo 'Controller:'.$controller.'<br>action:'.$product->{$action}();
    }

}

class MainController extends AppController
{
    private $name = 'Table';
    public $respons = null;

    public function __construct(){

    }

    public function getName()
    {
        return $this->name;
    }

    public function getRespons(){
        return $this->respons;
    }
}

class SecondController extends AppController
{
    private $name = 'Phone';
    public function getName()
    {
        return $this->name;
    }
}

$main = new AppController();
$main->run();



?>