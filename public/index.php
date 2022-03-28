<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';
use App\factory\AppFactory;



    
$app = AppFactory::create();





$app::run();



