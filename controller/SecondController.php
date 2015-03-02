<?php
/**
 * Created by PhpStorm.
 * User: andrush
 * Date: 15.02.15
 * Time: 19:59
 */
namespace Controller\SecondController;

use Controller\AppController\AppController;
use Model\Second\Second;
use lib\Core\View\View;


class SecondController extends AppController
{
    private $name = 'Table';

    // autoload model name
    public $model = 'Second';

    public function getName()
    {
        return $this->name;
    }

    public function index(){
        echo $this->model;
    }

    public function test2(){
        echo $this->Second->find();
    }
}