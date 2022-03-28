<?php

namespace Core\Auth;


use Core\Token\Token;
use Core\FormBuilder\FormBuilder;
use Symfony\Component\HttpFoundation\Request;


class LoginFormAuthenticator 
{   
    
    /**
     * formulaire de connexion
     *
     * @return form
     */
    public static function form()
    { 
        $request = Request::createFromGlobals();
        $token = new Token();
        $token->generateToken();      
     
        $email = $request->get('email');
        $form = new FormBuilder();

        
        $form->startForm('login', 'POST', 'login-form');
        $form->addFor( 'Email', 'Votre email')
        ->addEmail('email',  $email ?? '', ['label' => 'Email', 'required' => true, 'class'=>'form-text', 'autofocus', 'placeholder' => 'exemple@domain.com'])
        ->addFor( 'Password', 'Mot de passe')
        ->addPassword('password', '', ['label' => 'Password', 'required'=> true, 'class'=>'form-text', 'placeholder' => 'votre mot de passe'])
        ->addToken( $token)
        ->addBouton('Envoyer', ['class'=>'btn-primary btn mb-3 mt-3 form-button wow fadeInUp animated'])
        ->endForm();
        return $form;
    }
}