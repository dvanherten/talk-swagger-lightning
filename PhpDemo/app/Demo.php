<?php

namespace App;

class Demo
{
    public $id = 0;
    public $name = '';

    public function getExamples(){
        $obj1 = new Demo();
        $obj1->id = 1;
        $obj1->name = 'This has been fun!';
        
        $obj2 = new Demo();
        $obj2->id = 2;
        $obj2->name = 'Hopefully it is useful to you!';

        return array($obj1, $obj2);
    }
}
