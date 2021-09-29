<?php


namespace mzb\controller;

use mzb\Forms\Form;
use mzb\Controller\Controller;
use mzb\Security\Csrf;
use Nette\Http\RequestFactory;
use Nette\Http\Response;

class Auth extends Controller
{
    public function login()
    {
        $data = $this->httpRequest();
        dump($data['email']);
        dump($data['password']);
        dump($data['token']);
        
    }
    

    public function logout()
    {
        unset($_SESSION['admin']);
        header('Location: /');
    }
}
