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
        $router->add('GET', '/lock-screen', 'AuthController@verrouiller', 'dashboard');
        $router->add('POST', '/lock-screen', 'AuthController@verrouiller', 'dashboard');
       
        /** route profile admin */
        $router->add('GET', '/profile', 'AuthController@profile', 'profile');

        /** route create agent */
        $router->add('GET', '/agent-add', 'AgentController@add', 'agent.add');
        $router->add('POST', '/agent-add', 'AgentController@add', 'agent.add');
         $router->add('GET', '/agent-show', 'AgentController@show', 'agent.show');        
        $router->add('GET', '/agent-edit/:id', 'AgentController@edit', 'agent.edit');   

        $router->add('POST', '/agent-edit/agent-update/:id', 'AgentController@update', 'agent.update');

        $router->add('GET', '/agent-delete/:id', 'AgentController@delete', 'agent.delete');

        $router->add('GET', '/agent-show/:id', 'AgentController@show', 'agent.show');

        /**ROUTE MISSION */
        $router->add('GET', '/mission-add', 'MissionController@add', 'mission.add');
        $router->add('POST', '/mission-add', 'MissionController@add', 'mission.add');
        $router->add('GET', '/mission-show', 'MissionController@show', 'mission.show');
        $router->add('GET', '/mission-edit/:id', 'MissionController@edit', 'mission.edit');       
        $router->add('POST', '/mission-edit/mission-update/:id', 'MissionController@update', 'mission.update');
        $router->add('GET', '/mission-delete/:id', 'MissionController@delete', 'mission.delete');
        $router->add('GET', '/mission-show/:id', 'MissionController@show', 'mission.show');


        /**ROUTE CIBLE */
        $router->add('GET', '/cible-add', 'CibleController@add', 'cible.add');
        $router->add('POST', '/cible-add', 'CibleController@add', 'cible.add');
        $router->add('GET', '/cible-show', 'CibleController@show', 'cible.show');     
        $router->add('GET', '/cible-edit/:id', 'CibleController@edit', 'cible.edit');      

        $router->add('POST', '/cible-edit/cible-update/:id', 'CibleController@update', 'cible.update');

        $router->add('GET', '/cible-delete/:id', 'CibleController@delete', 'cible.delete');

        $router->add('GET', '/cible-show/:id', 'CibleController@show', 'cible.show');

        /**ROUTE CONTACT */
        $router->add('GET', '/contact-add', 'ContactController@add', 'contact.add');
        $router->add('POST', '/contact-add', 'ContactController@add', 'contact.add');
        $router->add('GET', '/contact-show', 'ContactController@show', 'contact.show'); 
        $router->add('GET', '/contact-edit/:id', 'ContactController@edit', 'contact.edit');
        $router->add('POST', '/contact-edit/contact-update/:id', 'ContactController@update', 'contact.update');
        $router->add('GET', '/contact-delete/:id', 'ContactController@delete', 'contact.delete');
        $router->add('GET', '/contact-show/:id', 'ContactController@show', 'contact.show');
        


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