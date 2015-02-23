<?php
/**
 * Created by PhpStorm.
 * User: andrush
 * Date: 15.02.15
 * Time: 20:48
 */

namespace  lib\Core\View;

class View
{
    public $Loader = null;

    public $twig = null;

    public function __construct($viewName){
        if (!empty($viewName)){
            $this->Loader = new \Twig_Loader_Filesystem('view'.DS.$viewName);
            $this->twig = new \Twig_Environment($this->Loader);
        };
    }

    public function render($name, $vars){
        echo $this->twig->render($name.'.twig', $vars);
    }

//    public function setView(){
//
//    }

}