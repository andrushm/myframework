<?php
//define('DS','\\');
require_once('lib'.DS.'Core'.DS.'view.php');

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

    /**
     * @var Twig
     */
    public $twig = null;


    public function __construct()
    {
        $this->respons = $_POST; //'respons';
    }

    public function getRespons()
    {
        return $this->respons;
    }

    public function test(){
        return __CLASS__;
    }
}