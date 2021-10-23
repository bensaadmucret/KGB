<?php declare(strict_types=1);

use Symfony\Component\HttpFoundation\Request;


if(!defined('DS')){ define('DS',DIRECTORY_SEPARATOR); }
if(!defined('ROOT')){define("ROOT", $_SERVER['DOCUMENT_ROOT']);}

// create a function static  absolute path for css, js, image
function staticPath($path)
{
  
    $httpRequest  = Request::createFromGlobals();

    //$baseUrl = $httpRequest->getPathInfo();
    $baseUrl = $httpRequest->server->get('HTTP_HOST');
    $baseUrl = 'http://'.$baseUrl;
 
  
    return $baseUrl .DS. $path;
}



