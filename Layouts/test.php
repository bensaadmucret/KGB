<?php declare(strict_types=1);

use Core\TemplateFactory\Page;
use Core\TemplateFactory\PHPTemplateFactory;


$test = 'test';
$page = new Page('Sample page', $test);

echo "Testing actual rendering with the PHPTemplate factory:\n";
echo $page->render(new PHPTemplateFactory());