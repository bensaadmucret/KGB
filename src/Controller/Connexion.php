<?php


namespace mzb\controller;

use mzb\Forms\Form;
use mzb\Controller\Controller;
use mzb\Security\Csrf;
use Nette\Http\RequestFactory;
use Nette\Http\Response;

class Connexion extends Controller
{
    public function index()
    {
        $token = new Csrf();
        $token->generateTokenAndSetItToSessionIfNotExists();
        $key = $token->getTokenFromSession();
        $data = ['welcome, JT'] ;
       
        $form = new Form();
        $form->start_form('/admin', 'post', '', [ 'class'=>'form-control', ])
        ->addFor('email', 'email')->addEmail('email', '', [ 'class'=>'form-control', 'maxlength'=>'40'])
        ->addFor('password', 'password')->addPassword('password', '', [ 'class'=>'form-control', 'required'=>'true', 'minlength'=>'4'])
        ->addToken($key)
        ->addBouton('Envoyer', ['class'=>'btn-primary btn mb-3 mt-3'])
        ->end_form();

        $this->render('/admin/login', compact('data', 'form'));
    }

    public function login()
    {
        $this->render('/admin/dashboard');
    }
}
