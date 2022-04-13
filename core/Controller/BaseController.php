<?php declare(strict_types=1);

namespace Core\Controller;


use App\Application;
use Core\Flash\Flash;
use Core\Session\Session;
use Core\Container\Container;
use Core\Database\Connection;
use Core\FormBuilder\FormBuilder;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

abstract class BaseController
{
    
    protected $request;
    protected $connection;
    protected $formBuilder;
    protected $session;
    protected $flash;
    protected $container;
    protected $model;
  

    public function __construct() {
        $this->request = Request::createFromGlobals();
        $this->connection = Connection::get()->connect();
        $this->formBuilder = new FormBuilder(); 
        $this->session = new Session();       
        $this->flash = new Flash();
        $this->container = Application::getContainer();
        $this->model = new \Core\Model\Model;
        $this->session->start();
       
    }

        
    
    public function redirect( string $url, int $statusCode, string $key=null, string $message = null): bool
    {
        try {
            /* Redirection vers une page différente du même dossier */
             $host  = $_SERVER['HTTP_HOST'];
             $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
             $extra = $url;
             if($key && $message){
                 Flash::setMessage($key, $message);
             }
            
             header("Location: http://$host$uri/$extra", TRUE, $statusCode);
             exit;
         } catch (\Exception $e) {
             return false;
         }

    }

    
    /**
     * @param string $view
     * @param array $data
     * @return Response
     */
    protected function render(string $tpl, array $parameters = [], string $model = null )
    {
        if ($parameters) {
            extract($parameters);
        }
       
        ob_start();
     

        require_once(APP_PATH. 'Layouts'. DS . $tpl . '.php');
        $content = ob_get_clean();
        $view =  $model ?? 'default';
        require_once(APP_PATH.'Layouts'. DS . $view . '.php');
        
    }

    
}
