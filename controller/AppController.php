<?php
//define('DS','\\');
require_once('lib'.DS.'Core'.DS.'view.php');
require_once('model'.DS.'Model.php');

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
        $this->respons = $_POST; //'respons';

        // connect model
        $model = $this->model;
        if (!empty($model)) {
            include('model' . DS . $model . '.php');
            if (class_exists($model)) {
                $this->{$model} = new $model($model);
            } else {
                throw new \Exception("Model '$model' not found!!!");
            }
        }

    }

    public function getRespons()
    {
        return $this->respons;
    }

    public function test(){

    }
}