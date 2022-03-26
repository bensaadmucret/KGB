<?php

namespace mzb;

use mzb\Container\Container;
use Mzb\Router\Router;

class Application
{

    /**
     * @return void
     */
    public static function run()
    {
        $router = new Router();
        Router::setNameSpace('mzb\\Controller\\');

        $router->add('GET', '/', 'HomeController@index', 'home');
        /*$router->add('POST', '/login', 'AuthController@login', 'login');
        $router->add('GET', '/login', 'AuthController@login', 'login');
        $router->add('GET', '/dashboard', 'AuthController@dashboard', 'dashboard');
        $router->add('POST', '/dashboard', 'AuthController@dashboard', 'dashboard');
        $router->add('GET', '/logout', 'AuthController@logout', 'logout');
        */
        $router->dispatch();
    }


    public static function getContainer(): Container
    {

        $container =  new Container();
        $container->set('Session', new \mzb\Session\Session);
        $container->set('Auth', new \mzb\Auth\LoginFormAuthenticator);
        $container->set('Database', new \mzb\Db\Connection);
        $container->set('Router', new \Mzb\Router\Router);
        $container->set('Validator', new \mzb\Validator\Validator);
        $container->set('Flash', new \mzb\Flash\Flash);


        $container->get('Session')->start();


        return $container;
    }


}
