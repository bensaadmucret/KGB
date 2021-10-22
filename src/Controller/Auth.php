<?php


namespace mzb\controller;

use mzb\Forms\Form;
use mzb\Db\Connection;


use mzb\Security\Csrf;
use mzb\Db\QueryBuilder;
use mzb\Model\UserModel;
use mzb\Security\Session;
use mzb\Services\LoginForm;
use mzb\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Auth extends Controller
{
    private $session;
    private $token;
    private $form;

    public function __construct()
    {
        $this->session = new Session();
        $this->token = new Csrf();
        $this->form = new Form();
    }
    public function login()
    {
        $userModel = new UserModel();
        $userModel->setName('mzb');
        $userModel->setPrenom('mohammed');
        $userModel->setEmail('mohammed.bensaad@itga.fr');
        $userModel->setPassword('password');
        $userModel->setTable('administrateur');
        $userModel->save();

        
        $form_login = new LoginForm($this->form);
        $form =  $form_login->make();
       
        $this->session->start();
 

        if ($this->session->get_session('admin')) {
            $redirection = new RedirectResponse('dashboard', 302);
            return $redirection->send();
        }
       
        
        $session = $this->session;
        

        return $this->render('/admin/login', compact('form', 'session'));
    }

    /**
     * vérification des données du formulaire
     *  redirection de l'utilisateur admin
     *
     * @return void
     */
    public function checkLogin()
    {
        try {
            $db =   Connection::get()->connect();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
        $modelUser = new UserModel();
       
        $result = $modelUser->getAll('administrateur');

        
        dump($result);
           
           
        if ($result['email'] === isset($_POST['email']) && $result['password'] === isset($_POST['password'])) {
            $this->session->set_session('admin', true);
            $redirection = new RedirectResponse('dashboard', 302);
            return $redirection->send();
        } else {
            $form_login = new LoginForm($this->form);
            $form =  $form_login->make();
            $this->session->set_session('error', 'Votre email ou mot de passe est incorrect');
            $session = $this->session;
            return $this->render('/admin/login', compact('session', 'form'));
        }
    }
            
        

    private function isLogged()
    {
        $session = new Session();
        $session->start();
        if ($session->get_session('email') != null) {
            return true;
        } else {
            return false;
        }
    }


    public function dashboard()
    {
        if ($this->isLogged()) {
            return $this->render('/admin/dashboard');
        } else {
            $session = new Session();
            $session->start();
            $session->set_session('error', 'Vous devez vous connecter pour accéder à cette page');

            $redirection = new RedirectResponse('login', 302);
            return $redirection->send();
        }
    }

        
           

    public function logout()
    {
        $session = new Session();
        $session->start();
        $session->destroy_session('admin');
        $session->destroy_session('email');
        $redirection = new RedirectResponse('/', 302);
        return $redirection->send();
    }
}
