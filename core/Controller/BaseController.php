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
  

    public function __construct() {
        $this->request = Request::createFromGlobals();
        $this->connection = Connection::get()->connect();
        $this->formBuilder = new FormBuilder(); 
        $this->session = new Session();
        $this->session->start();
        $this->flash = new Flash();
        $this->container = Application::getContainer();
       
    }

        
    
    public function redirect( string $url, int $statusCode, string $key, string $message = null): bool
    {
        try {
           /* Redirection vers une page différente du même dossier */
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = $url;
            Flash::setMessage($key, $message);
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
     

        require_once('app'. DS . 'Layouts'. DS . $tpl . '.php');
        $content = ob_get_clean();
        $view =  $model ?? 'default';
        require_once('app' . DS . 'Layouts'. DS . $view . '.php');
        
    }

    
}
