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
        $form->start_form('/admin', 'post', '', [ 'class'=>'form-control form-text wow fadeInUp animated' ])
        ->addFor('email', 'email')->addEmail('email', '', [ 'class'=>'form-control form-text wow fadeInUp animated', 'maxlength'=>'40'])
        ->addFor('password', 'password')->addPassword('password', '', [ 'class'=>'form-control form-text wow fadeInUp animated', 'required'=>'true', 'minlength'=>'4'])
        ->addToken($key)
        ->addBouton('Envoyer', ['class'=>'btn-primary btn mb-3 mt-3 form-button wow fadeInUp animated'])
        ->end_form();

        $this->render('/admin/dashboard', compact('data', 'form'));
    }
}
