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
        $router::setNameSpace('mzb\\Controller\\');

        $router->add('GET','/', 'HomeController@index', 'home');
        $router->add( 'GET','/login', 'AuthController@login', 'login');
        $router->add('POST', '/login', 'AuthController@login', 'login');
        $router->add('GET', '/logout', 'AuthController@logout', 'logout');

      /*  $router->add('GET', '/dashboard', 'AuthController@dashboard', 'dashboard');
        $router->add('POST', '/dashboard', 'AuthController@dashboard', 'dashboard');
        $router->add('GET', '/logout', 'AuthController@logout', 'logout');
        $router->add('GET', '/register', 'AuthController@register', 'register');*/
        $router->run();
    }


    public static function getContainer(): Container
    {

        $container =  new Container();
        $container->set('Session', new \mzb\Session\Session);
        $container->set('Database', new \mzb\Db\Connection);
        $container->set('Router', new \mzb\Router\Router);
        $container->set('Validator', new \mzb\Validator\Validator);
        $container->set('Flash', new \mzb\Flash\Flash);
        $container->set('Request', new \Symfony\Component\HttpFoundation\Request);
        $container->set('Formfactory', new \mzb\Form\Formfactory);



        $container->get('Session')->start();


        return $container;
    }


}
