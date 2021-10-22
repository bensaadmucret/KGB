<?php declare(strict_types=1);


use Nette\Http\RequestFactory;

if(!defined('DS')){ define('DS',DIRECTORY_SEPARATOR); }
if(!defined('ROOT')){define("ROOT", $_SERVER['DOCUMENT_ROOT']);}

// create a function static  absolute path for css, js, image
function staticPath($path)
{
    $factory = new RequestFactory;
    $httpRequest = $factory->fromGlobals();

    $baseUrl = $httpRequest->getUrl()->getBaseUrl();
  
    return $baseUrl . $path;
}
