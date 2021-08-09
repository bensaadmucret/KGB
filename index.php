<?php
declare(strict_types=1);

namespace mzb;

use mzb\Router\Router;

require_once __DIR__ . '/vendor/autoload.php';


$router = new Router();
$router->set404(function () {
    header('HTTP/1.1 404 Not Found');
    echo '404 Not Found';
});

$router->set404('/api(/.*)?', function () {
    header('HTTP/1.1 404 Not Found');
    header('Content-Type: application/json');

    $jsonArray = array();
    $jsonArray['status'] = "404";
    $jsonArray['status_text'] = "route not defined";

    echo json_encode($jsonArray);
});

$router->setNamespace('mzb\Controller');
$router->get('', 'Wellcome@index');
$router->post('', 'Wellcome@postFormSucceeded');

$router->run();
