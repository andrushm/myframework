<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 16.02.2015
 * Time: 12:05
 */

//$dsn = 'mysql:dbname=myFrame;host=127.0.0.1';
//$user = 'root';
//$password = 'root_access';
//$prefix = 'my_';
namespace lib\Core\Config;

class Config {
    /** Default locale
     * @var string
     */
    protected $locale = 'eng';

    /** Default controller
     * @var string
     */
    protected $controller = 'Main';

    protected $hostname = 'http://myframework';

    public function __get($method){
        return isset($this->{$method}) ? $this->{$method} : null;
    }

}

