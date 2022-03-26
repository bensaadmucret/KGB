<?php

namespace mzb\Container\TestClass;

class Foo
{
    public function __construct(Bar $bar)
    {
        $bar->bar();
    }

    public function foo()
    {
        echo 'foo';
    }

}