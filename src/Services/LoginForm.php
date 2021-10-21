<?php

namespace mzb\Services;

use mzb\Forms\Form;
use mzb\Security\Csrf;

class LoginForm
{
    private $form;

    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function make()
    {
    $token = new Csrf();
    $token->generateTokenAndSetItToSessionIfNotExists();
    $key = $token->getTokenFromSession();
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    
    $form = new Form();
    $form->start_form('login', 'POST', 'login', 
    [ 'class'=>'form-control form-text wow fadeInUp animated' ])
    ->addFor('email', 'email')->addEmail('email', $email, 
    [ 'class'=>'form-control form-text wow fadeInUp animated', 
    'maxlength'=>'40'])
    ->addFor('password','Votre mode de passe')
    ->addPassword('password', '', 
    [ 'class'=>'form-control form-text wow fadeInUp animated', 
    'required'=>'true', 'minlength'=>'4'])
    ->addToken($key)
    ->addBouton('Envoyer', 
    ['class'=>'btn-primary btn mb-3 mt-3 form-button wow fadeInUp animated'])
    ->end_form();

    return $form;
    }
    
    
}