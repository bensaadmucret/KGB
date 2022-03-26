<?php declare(strict_types=1);

namespace mzb\Auth;

use mzb\Form\FormBuilder;
use mzb\Session\Session;
use mzb\Token\Token;
use Symfony\Component\HttpFoundation\Request;

/**
 * LoginFormAuthenticator authenticates users based on the login form.
 * @author Mohammed Bensaad
 */
class LoginFormAuthenticator
{

    /**
     * formulaire de connexion
     *
     * @return form
     */
    public static function form()
    {
        $session = new Session();
        $token = Token::generateToken($session);

        $request = new Request;
        $email = $request->get('email');
        $form = new FormBuilder();


        $form->startForm('/login', 'POST', 'login-form');
        $form->addFor( 'Email', 'Votre email')
            ->addEmail('email',  $email ?? '', ['label' => 'Email', 'required' => true, 'autofocus', 'placeholder' => 'exemple@domain.com'])
            ->addFor( 'Password', 'Mot de passe')
            ->addPassword('password', 'password', ['label' => 'Password', 'required'=> true, 'placeholder' => 'votre mot de passe'])
            ->addToken( $token)
            ->addBouton('Envoyer', ['class'=>'btn-primary btn mb-3 mt-3 form-button wow fadeInUp animated'])
            ->endForm();
        return $form;
    }
}