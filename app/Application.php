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
        
      
        $router->dispatch();
    }
    

    public static function getContainer(): Container
    {
        
        $container =  new Container();
        $container->set('Session', new \Core\Session\Session);
        // $container->set('Auth', new \Core\Auth\Auth);
        $container->set('Database', new \Core\Database\Connection);
        $container->set('Router', new \Core\Router\Router);
      //  $container->set('View', new \Core\View\View);
     //   $container->set('Validator', new \Core\Validator\Validator);
          $container->set('Flash', new \Core\Flash\Flash);


       $container->get('Session')->start();
               
        
        return $container;
    }

    
}
