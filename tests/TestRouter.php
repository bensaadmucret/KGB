<?php
declare(strict_types=1);

namespace Stack\tests;

use Core\Router\Router;
use Symfony\Component\HttpClient\HttpClient;


use Core\Router\RouterException;
use PHPUnit\Framework\TestCase;
use App\Router\Controller\AboutController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestRouter extends TestCase
{
    private $router;
    private $request;

    protected function setUp(): void
    {
        $this->router = new Router();
        $this->request = Request::createFromGlobals();
    }

    public function testRouterInstance()
    {
        $router = $this->router;
        $this->assertInstanceOf(Router::class, $router);
    }
    
    
    public function testRouterBasic()
    {
        $router =$this->router;
        $response = new Response();

        router::setNameSpace('App\\Controller\\');
        $router->add('GET', '/about', 'AboutController@about', 'about');
       
        $request = Request::create('/about');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('/about', $router->getRouteByName('about'));
        $this->assertEquals($router->getRouteByName('about'), $request->getPathInfo());
    }

    public function testRouterWithParams()
    {
        $router = $this->router;
        $response = new Response();
        router::setNameSpace('App\\Controller\\');
        $router->add('GET', '/about/1', 'AboutController@about', 'about');
        $request = Request::create('/about/1');
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('/about/1', $router->getRouteByName('about'));
        $this->assertEquals($router->getRouteByName('about'), $request->getPathInfo());
    }

    //test route not found
    public function testRouterNotFound()
    {
        $router = $this->router;
        $response = new Response();
        router::setNameSpace('App\\Controller\\');
        $router->add('GET', '/about/1', 'AboutController@about', 'about');
        $request = Request::create('/about/2');
        $response->setContent('No matching routes');
        $response->setStatusCode(Response::HTTP_NOT_FOUND);
        
        $this->assertEquals(Response::HTTP_NOT_FOUND, $response->getStatusCode());
        $this->assertNotEquals('/about/2', $router->getRoute('AboutController@about'));
        $this->assertNotEquals($router->getRoute('AboutController@about'), $request->getPathInfo());
        $this->assertEquals('No matching routes', $response->getContent());
    }

    
   

    public function testGetNameSpace()
    {
        $router = $this->router;
        $response = new Response();
        router::setNameSpace('App\\Controller\\');
        $router->add('GET', '/about:1', 'AboutController@about', 'about');
        $request = Request::create('/about/1');
        $this->assertEquals('App\\Controller\\', $router->getNameSpace());
    }

    public function testGetName()
    {
        $router = $this->router;        
        router::setNameSpace('App\\Controller\\');
        $router->add('GET', '/about/1', 'AboutController@about', 'about');
        $request = Request::create('/about/1');
        $this->assertEquals('/about/1', $router->getRouteByName('about'));
    }

    
    public function testGetMethod()
    {
        $router = $this->router;
        $response = new Response();
        router::setNameSpace('App\\Controller\\');
        $router->add('GET', '/about/1', 'AboutController@about', 'about');      
        $request = Request::create('/about/1');
        $this->assertEquals('GET', $router->getMethod());
    }


    public function testGet()
    {
        $router = $this->router;
        $response = new Response();
        router::setNameSpace('App\\Controller\\');
        $router->add('GET', '/about/1', 'AboutController@about', 'about');
        $request = Request::create('/about/1');
        $this->assertEquals('GET', $router->getMethod());
    }

    
    
    public function testGetRouteByName()
    {
        $router = new Router();
        router::setNameSpace('App\\Controller\\');
        $router->add('GET', '/about/1', 'AboutController@about', 'about');
        $request = Request::create('/about/1');
        $this->assertEquals('/about/1', $router->getRouteByName('about'));
    }


    public function testGetRouteByNameWithParameters()
    {
        $router = new Router();
        router::setNameSpace('App\\Controller\\');
        $router->add('GET', '/about/1', 'AboutController@about', 'about');
        $request = Request::create('/about/1');
        $this->assertEquals('/about/1', $router->getRouteByName('about'));
    }

   

    
    public function testRun()
    {
        $router = new Router();
        
        router::setNameSpace('App\\Controller\\');
        $router->add('GET', '/about/1', 'AboutController@about', 'about');
        $request = Request::create('/about/1');
        $response = new Response(
            '<h1>About</h1>',
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
        $this->assertEquals($response->getContent(), '<h1>About</h1>');
    }

    public function testRunWithException()
    {
        $router = new Router();
        $response = new Response();
        router::setNameSpace('App\\Controller\\');
        $router->add('GET', '/about/1', 'AboutController@about', 'about');
        $request = Request::create('/about/notfound');
        $this->expectExceptionMessage('No matching routes');
        $router->run();
    }
}