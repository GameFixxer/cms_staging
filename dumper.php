<?php

declare(strict_types=1);

class Foo{

    public function testBar($foo) : bool
    {
        return $foo;
    }
}

$foo = new Foo();
var_dump($foo->testBar(1));