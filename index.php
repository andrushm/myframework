<?php
class RouterFactory
{
    public static function build($controller) //,  $sku, $name)
    {
        $class = ucfirst($controller).'Controller';
//        var_dump($class);die;
        if (class_exists($class)) {
            return new $class(); //$sku, $name);
        } else {
            throw new \Exception("Class epsent!!!");
        }
    }
}


class MainController
{
    private $name = 'Table';
    public function getName()
    {
        return $this->name;
    }
}

class SecondController
{
    private $name = 'Phone';
    public function getName()
    {
        return $this->name;
    }
}

$url = $_SERVER['REQUEST_URI'].'/';
$url_param = array();
preg_match_all('([^\/]+)', $url, $url_param); // ([^\/]+)  ([*/]\w+)
$url_param = $url_param[0];
//var_dump($url_param);
$controller = $url_param[1];
$action = $url_param[2];
$product = RouterFactory::build($controller);
echo 'Controller:'.$controller.'<br>action:'.$product->{$action}();

?>