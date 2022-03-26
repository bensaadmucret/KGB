<?php declare(strict_types=1);

namespace mzb;
use mzb\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';


$app = AppFactory::create();

$container = $app::getContainer();
$container->get('Database')->connect();

$app::run();



