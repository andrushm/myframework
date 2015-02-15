<?php
/**
 * Created by PhpStorm.
 * User: andrush
 * Date: 15.02.15
 * Time: 19:54
 */
include('controller'.DS.'AppController.php');

class MainController extends AppController
{
    private $name = 'Table';

    public function index(){
        $view = new View('Main');
        $view->render('index', array('name' => 'Misha'));

    }

}