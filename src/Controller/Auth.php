<?php


namespace mzb\controller;

use mzb\Forms\Form;
use mzb\Controller\Controller;
use mzb\Security\Csrf;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\RequestException;


class Auth extends Controller
{
    public function login()
    {
        $response = new Response();
        $token = new Csrf();
        $token->generateTokenAndSetItToSessionIfNotExists();
        $key = $token->getTokenFromSession();
       
        $form = new Form();
        $form->start_form('/admin', 'post', '', 
        [ 'class'=>'form-control form-text wow fadeInUp animated' ])
        ->addFor('email', 'email')->addEmail('email', '', 
        [ 'class'=>'form-control form-text wow fadeInUp animated', 
        'maxlength'=>'40'])
        ->addFor('password', 'password')
        ->addPassword('password', '', 
        [ 'class'=>'form-control form-text wow fadeInUp animated', 
        'required'=>'true', 'minlength'=>'4'])
        ->addToken($key)
        ->addBouton('Envoyer', 
        ['class'=>'btn-primary btn mb-3 mt-3 form-button wow fadeInUp animated'])
        ->end_form();

        

        return $this->render('/admin/login', compact('form'));
        

       

        


        


        
    }
    

    public function logout()
    {
        unset($_SESSION['admin']);
        header('Location: /');
    }
}
