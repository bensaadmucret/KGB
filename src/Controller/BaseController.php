<?php declare(strict_types=1);


namespace mzb\Controller;

use mzb\Application;
use mzb\Flash\Flash;

/**
 * Class Controller
 * @package mzb\Controller
 * @author Mohammed Bensaad
 */

class BaseController
{
    protected $container;
    /**
     * @var Container
     */
    public function __construct() {
        $this->container = Application::getContainer();
       // dump($this->container);
    }


    /**
     * @param string $url
     * @param int $statusCode
     * @param string $key
     * @param string|null $message
     * @return bool
     */
    public function redirect(string $url, int $statusCode): bool
    {
        try {
            /* Redirection vers une page différente du même dossier */
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = $url;

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
        require_once(APP_PATH.'Layouts'. DS . $tpl . '.php');
        $content = ob_get_clean();
        $view =  $model ?? 'default';
        require_once(APP_PATH.'Layouts'. DS . $view . '.php');

    }


}