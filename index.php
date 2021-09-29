<?php
declare(strict_types=1);

namespace mzb;

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



$router->get('/admin', 'Connexion@login');
$router->post('/admin', 'Connexion@login');

$router->post('/login', 'Auth@login');
$router->get('/login', 'Connexion@index');


$router->get('', 'Wellcome@index');
$router->post('', 'Wellcome@postFormSucceeded');










$router->run();

$router->get('', 'Wellcome@index');
$router->post('', 'Wellcome@postFormSucceeded');

$router->before('GET|POST', '/admin/.*', function () {
    if (!isset($_SESSION['admin'])) {
        header('location: /auth/login');
        exit();
    }
});






$router->run();

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


$router->get('/admin', 'Connexion@index');
$router->get('', 'Wellcome@index');
$router->post('', 'Wellcome@postFormSucceeded');

$router->before('GET|POST', '/admin/.*', function () {
    if (!isset($_SESSION['admin'])) {
        header('location: /auth/login');
        exit();
    }
});






$router->run();

$router->get('', 'Wellcome@index');
$router->post('', 'Wellcome@postFormSucceeded');

$router->before('GET|POST', '/admin/.*', function () {
    if (!isset($_SESSION['admin'])) {
        header('location: /auth/login');
        exit();
    }
});






$router->run();
