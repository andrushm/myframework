<?php
/**
 * Created by PhpStorm.
 * User: andrush
 * Date: 15.02.15
 * Time: 19:59
 */
require('controller'.DS.'AppController.php');

class SecondController extends AppController
{
    private $name = 'Phone';

    public $model = 'Second';

    public function getName()
    {
        return $this->name;
    }

    public function test2(){
        echo $this->Second->find();
    }
}