<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 20.02.2015
 * Time: 13:06
 */
namespace My\test;

class test
{
    public function get()
    {
        return 'My\test';
    }
}

namespace My\test2;
use My\test\test;
class test2
{
    public function get()
    {
        $ww = new test();
        echo 'My\test2';
        echo 'new:'.$ww->get();
    }
}

namespace test3;

use My\test2\test2;

$rr = new test2();
echo $rr->get();