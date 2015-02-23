<?php
/**
 * Created by PhpStorm.
 * User: andrush
 * Date: 15.02.15
 * Time: 19:54
 */

namespace Controller\MainController;

use Controller\AppController\AppController;
use Model\Main\Main;
use lib\Core\View\View;

class MainController extends AppController
{
    private $name = 'Table';

    // autoload model name
    public $model = 'Main';


    public function index(){

        $view = new View('Main');
        $this->Main = new Main($this->model);
        $res = $this->Main->select('*')
                          ->from()
//                          ->where('id = 1')
                          ->exec();

        $view->render('index', array('names' => $res));

    }



    public function test2(){
        $templ = '{fghfghf}';
        $regs = "!(^{([^}]+)}$)!is"; //"!({([^}]+)})!is";
        var_dump(preg_match_all($regs , $templ, $matches));
    }

}