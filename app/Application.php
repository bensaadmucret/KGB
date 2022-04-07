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
       
        /** route profile admin */
        $router->add('GET', '/profile', 'AuthController@profile', 'profile');

        /** route create agent */
        $router->add('GET', '/agent-add', 'AgentController@add', 'agent.add');
        $router->add('POST', '/agent-add', 'AgentController@add', 'agent.add');
        
        /** voir tous les agents*/
        $router->add('GET', '/agent-show', 'AgentController@show', 'agent.show');
        $router->add('GET', '/agent-edit/:id', 'AgentController@edit', 'agent.edit');
        $router->add('POST', '/agent-edit/agent-update/:id', 'AgentController@update', 'agent.update');
        $router->add('GET', '/agent-delete/:id', 'AgentController@delete', 'agent.delete');
        $router->add('GET', '/agent-show/:id', 'AgentController@show', 'agent.show');

        /**ROUTE MISSION */
        $router->add('GET', '/mission-add', 'MissionController@add', 'mision.add');
        $router->add('POST', '/mission-add', 'MissionController@add', 'mision.add');
        $router->add('GET', '/mission-show', 'MissionController@show', 'mision.show');

        /**ROUTE CIBLE */


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
        $container->set('Model', new \Core\Model\Model);


        $container->get('Session')->start();
               
        
        return $container;
    }

    
}
