<?php declare(strict_types=1);

use Symfony\Component\HttpFoundation\Request;
use Core\Flash\Flash;

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
if (!defined('ROOT')) {
    define("ROOT", dirname($_SERVER['DOCUMENT_ROOT']));
}
if (!defined('APP_PATH')) {
    define("APP_PATH", ROOT . DS);
}


// absolute path for css, js, image
function assets($path)
{
    $httpRequest  = Request::createFromGlobals();
    $baseUrl = $httpRequest->server->get('HTTP_HOST');
    $baseUrl = 'http://'.$baseUrl;
    return $baseUrl . $path;
}

function UpercaseFirst($string)
{
    return ucfirst($string);
}


function get_flash_message_error(){
    if (!empty( $_SESSION['error'])):?>
        <div class="alert alert-danger">
            <?php echo Flash::getMessage('error'); ?>
        </div>
   <?php endif; 
}

function get_fkash_message_success(){
    if (!empty( $_SESSION['success'])):?>
        <div class="alert alert-success">
            <?php echo Flash::getMessage('success'); ?>
        </div>
   <?php endif; 
}
