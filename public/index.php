<?php declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
if (!defined('ROOT')) {
    define("ROOT", dirname($_SERVER['DOCUMENT_ROOT']));
}
if (!defined('APP_PATH')) {
    define("APP_PATH", ROOT . DS);
}

include_once '../vendor/autoload.php';
use App\factory\AppFactory;



    
$app = AppFactory::create();

$container = $app::getContainer();
$container->get('Database')->connect();



$app::run();



