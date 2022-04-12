<?php declare(strict_types=1);

use Core\Flash\Flash;
use Core\Model\Model;
use Symfony\Component\HttpFoundation\Request;




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

function check_is_logged_in()
{
    $session = new \Core\Session\Session;
    if (!$session->get('user')) {
        header('Location: /login');
        exit();
    }
   
}


function dateFormate($date){
$originalDate = $date;
$timestamp = strtotime($originalDate); 
$newDate = date("m-d-Y", $timestamp );
return $newDate;
}

function get_flash_message_error(){
    if (!empty( $_SESSION['error'])):?>
        <div class="alert alert-danger">
            <?php echo Flash::getMessage('error'); ?>
        </div>
   <?php endif; 
}

function get_flash_message_success(){
    if (!empty( $_SESSION['success'])):?>
        <div class="alert alert-success">
            <?php echo Flash::getMessage('success'); ?>
        </div>
   <?php endif; 
}


function listeAgent() {
    $model = new Model();
    return $model->getAll('agent');
 
}


function listeContact() {
    $model = new Model();
    return $model->getAll('contact');
 
}

function listeCible() {
    $model = new Model();
    return $model->getAll('cible');
 
}