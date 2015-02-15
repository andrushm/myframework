<?php
/**
 * Created by PhpStorm.
 * User: andrush
 * Date: 15.02.15
 * Time: 19:59
 */
include('controller\\AppController.php');

class SecondController extends AppController
{
    private $name = 'Phone';
    public function getName()
    {
        return $this->name;
    }
}