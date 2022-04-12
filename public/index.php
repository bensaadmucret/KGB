<?php declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once(APP_PATH. 'vendor'. DS .'autoload.php');
use App\factory\AppFactory;
//use Core\Database\Connection;


    
$app = AppFactory::create();

$container = $app::getContainer();
$container->get('Database')->connect();



$app::run();



