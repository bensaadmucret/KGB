<?php declare(strict_types=1);


namespace mzb\Controller;

use mzb\Container\Container;

/**
 * Class Controller
 * @package mzb\Controller
 * @author Mohammed Bensaad
 */

class Controller
{
    protected $container;
    /**
     * @var Container
     */
    public function __construct() {
        $this->container = new Container();
    }


    /**
     * @param string $url
     * @param int $statusCode
     * @param string $key
     * @param string|null $message
     * @return bool
     */
    public function redirect(string $url, int $statusCode, string $key, string $message = null): bool
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
        require_once(APP_PATH.'Layouts'. DS . $tpl . '.php');
        $content = ob_get_clean();
        $view =  $model ?? 'default';
        require_once(APP_PATH.'Layouts'. DS . $view . '.php');

    }


}