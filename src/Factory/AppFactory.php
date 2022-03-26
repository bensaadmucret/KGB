<?php declare(strict_types=1);

namespace mzb\Factory;

use mzb\Application;

class AppFactory
{
    public static function create()
    {
        $app = new Application();
        return $app;
    }

}