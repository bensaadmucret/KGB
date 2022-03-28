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
        $router->add('GET', '/dashboard', 'AuthController@dashboard', 'dashboard');
        $router->add('POST', '/dashboard', 'AuthController@dashboard', 'dashboard');
        $router->add('GET', '/logout', 'AuthController@logout', 'logout');
         
      
        $router->dispatch();
    }
    

    public static function getContainer(): Container
    {
        
        $container =  new Container();
        $container->set('Session', new \Core\Session\Session);     
        $container->set('Db', new \Core\Database\Connection);
        $container->set('Router', new \Core\Router\Router);
        $container->set('Request', new \Symfony\Component\HttpFoundation\Request);
        $container->set('Response', new \Symfony\Component\HttpFoundation\Response);        
        $container->set('Flash', new \Core\Flash\Flash);
        $container->set('FormBuilder', new \Core\FormBuilder\FormBuilder);
        $container->set('Token', new \Core\Token\Token);


      
               
        
        return $container;
    }

    
}
