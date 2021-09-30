<?php declare(strict_types=1);

use Nette\Http\Response;
use Nette\Http\RequestFactory;

define('DS', DIRECTORY_SEPARATOR);
define("ROOT", $_SERVER['DOCUMENT_ROOT']);

// create a function static  absolute path for css, js, images
function staticPath($path)
{
    $factory = new RequestFactory;
    $httpRequest = $factory->fromGlobals();

    $baseUrl = $httpRequest->getUrl()->getBaseUrl();
  
    return $baseUrl . $path;
}
