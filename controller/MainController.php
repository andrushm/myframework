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

    //public $table = 'ma'

    public $model = 'Main';



    public function index(){
        $view = new View('Main');

        $view->render('index', array('names' => $this->Main->find()));

    }

    public function test2(){
        var_dump($this->Main->find());

//        $view = new View('Main');
//        $view->render('index', array('name' => $this->Main->find()));
    }

}