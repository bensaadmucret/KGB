<?php declare(strict_types=1);

namespace App;

use Core\Router\Router;
use Core\Container\Container;

class Application
{
    
    public static function run()
    {
        $router = new Router();
        Router::setNameSpace('App\\Controller\\');
        
        $router->add('GET', '/', 'HomeController@index', 'home');
        $router->add('POST', '/login', 'AuthController@login', 'login');    
        $router->add('GET', '/login', 'AuthController@login', 'login');
        $router->add('GET', '/logout', 'AuthController@logout', 'logout');
        $router->add('GET', '/dashboard', 'AuthController@dashboard', 'dashboard');
        $router->add('POST', '/dashboard', 'AuthController@dashboard', 'dashboard');
        $router->add('GET', '/create-agent', 'CreateAgentController@store', 'create-agent');
        $router->add('POST', '/create-agent', 'CreateAgentController@store', 'create-agent');
        $router->dispatch();
    }
    

    public static function getContainer(): Container
    {
        
        $container =  new Container();
        $container->set('Session', new \Core\Session\Session);
        $container->set('Database', new \Core\Database\Connection);
        $container->set('Router', new \Core\Router\Router);
        $container->set('Flash', new \Core\Flash\Flash);
        $container->set('Request', new \Symfony\Component\HttpFoundation\Request);


        $container->get('Session')->start();
               
        
        return $container;
    }

    
}
