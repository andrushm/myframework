<?php
//define('DS','\\');
//require_once('lib'.DS.'Core'.DS.'view.php');
//require_once('model'.DS.'Model.php');
namespace Controller\AppController;

use Model\Model\Model;


class AppController
{
    /**
     * @var Response
     */
    public $respons = null;

    /**
     * @var Template for Twig
     */
    public $loader = null;

    public $template_patch = '';

    public $model = array();

    /**
     * @var Twig
     */
    public $twig = null;


    public function __construct()
    {
        // get model name
//      $this->model =
//        var_dump(str_replace('Controller', '',substr(strrchr(__CLASS__, '\\'),1)));
        $this->respons = $_POST; //'respons';
        $this->{$this->model} = null;
        // connect model
        $model = $this->model;
        if (!empty($model)) {
//            require('model' . DS . $model . '.php');
            $model = 'Model\\'.$model.'\\'.$model;
//            if (class_exists($model)) {
                $this->{$model} = new $model($this->model);
//            } else {
//                throw new \Exception("Model '$model' not found!!!");
//            }
        }

    }

    public function getRespons()
    {
        return $this->respons;
    }

    public function test(){

    }
}