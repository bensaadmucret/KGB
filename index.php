<?php declare(strict_types=1);

namespace mzb;

use mzb\Router\Router;

require_once 'Helper.php';

require_once __DIR__ . '/vendor/autoload.php';


$router = new Router();

 $router->mount('/movies', function () use ($router) {

        // will result in '/movies'
     $router->get('/', function () {
         echo 'movies overview';
     });

     // will result in '/movies'
     $router->post('/', function () {
         echo 'add movie';
     });

     // will result in '/movies/id'
     $router->get('/(\d+)', function ($id) {
         echo 'movie id ' . htmlentities($id);
     });

     // will result in '/movies/id'
     $router->put('/(\d+)', function ($id) {
         echo 'Update movie id ' . htmlentities($id);
     });
 });


$router->setNamespace('mzb\Controller');
$router->get('/', 'Wellcome@test');



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


    // Thunderbirds are go!
    $router->run();
