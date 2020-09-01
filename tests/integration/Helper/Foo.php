<?php

declare(strict_types=1);

trait Foo {
    public function name(): string
    {
        return 'John Doe';
    }
}

class Bar{
    use Foo;

    public function name(): string
    {
        return 'Jahne Doe';
    }
}

class FooBar{
    public function test(Foo $foo): string {
        return $foo->name();
    }
}

$bar = new Bar();
$fooBar = new FooBar();
echo $fooBar->test($bar);