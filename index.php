<?php declare(strict_types=1);

namespace mzb;
use mzb\Db\Connection;
use mzb\Router\Router;

require_once __DIR__ . '/vendor/autoload.php';





$router = new Router();
$router->setNamespace('mzb\Controller');
$router->set404(
    function () {
        header('HTTP/1.1 404 Not Found');
        echo '404 Not Found hello';
    }
);

$router->set404('/api(/.*)?', function () {
    header('HTTP/1.1 404 Not Found');
    header('Content-Type: application/json');

    $jsonArray = array();
    $jsonArray['status'] = "404";
    $jsonArray['status_text'] = "route not defined";

    echo json_encode($jsonArray);
});



$router->get('', 'Wellcome@index');
$router->post('', 'Wellcome@postFormSucceeded');
$router->get('/login', 'Auth@login');
$router->post('/login', 'Auth@checkLogin');
$router->get('/logout', 'Auth@logout');
$router->get('/dashboard', 'Auth@dashboard');




$router->run();
