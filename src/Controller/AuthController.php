<?php declare(strict_types=1);

namespace mzb\Controller;

use mzb\Auth\LoginFormAuthenticator as Authenticator;
use mzb\Controller\BaseController;



class AuthController extends BaseController
{
    private $session;
    private $request;

    public function __construct()
    {
        parent::__construct();
        $this->session = $this->container->get('Session');
        $this->request = $this->container->get('Request');


    }


    /**
     * Authenticate a user with the given credentials.
     *
     * @param Request $request
     * @return bool
     */
    public function login()
    { 
        dump($this->request->get('email'));
        
        if($this->session->has('user')) {
            if($this->isAdmin($this->session->get('user'))) {
                return $this->redirect('dashboard', 302, 'success', 'Vous êtes déjà connecté');
            }
            return $this->redirect('dashboard', 302, 'success', 'Vous êtes déjà connecté');
        }

        if($this->request->isMethod('post')){
            $email = $this->request->get('email');
            $password = $this->request->get('password');
            $user = $this->getUserDB($email, $password);

            $this->loginPost($user);
        }

        $this->session->set('error', 'Erreur d\'authentification');
        $this->render('admin/login',
            [
                'title' => 'Login',
                'message' => 'Veuillez vous connecter pour accéder à la zone d\'administration...',
                'error' => $this->session->get('error'),
                'form' => Authenticator::form(),
            ]);

    }

    public function loginPost($user)
    {


        if(!$user) {
            return $this->redirect('login', 302, 'error', 'Invalid credentials.');
        }

        $token = $this->request->get('token');
        if(Token::isTokenValidInSession( $token, $this->session) && $this->postIsValide()) {
            $this->session->set('user', $user);
            $message = 'You are now logged in.';
            return $this->redirect('dashboard', 302, 'success', $message);
        }


        Flash::setMessage('error', 'identifiant invalide.');
        return false;


    }

    /**
     * chek if user is authenticated and admin
     *
     * @return boolean
     */
    public function isAdmin($user)
    {
        if(!isset($_SESSION['user'])) {
            return false;
        }


        if($user['role'] == 'admin') {
            return true;
        }



        return false;
    }

    /**
     * logout user
     *
     * @return void
     */
    public function logout()
    {

        $session = $this->session;
        $session->remove('user');
        $session->remove('admin');
        $redirection = new RedirectResponse('login', 302);
        return $redirection->send();

    }


    /**
     * get user in session
     * @return array
     */
    public function isLoggedIn()
    {
        return isset($_SESSION['user']);
    }


    /**
     * @return user in session
     */
    public function getUser()
    {
        return $_SESSION['user'];
    }

    /**
     * get user in database
     *
     * @param [type] $email
     * @param [type] $password
     * @return void
     */
    private function getUserDB($email, $password)
    {
        $db =  $this->connection;
        $query = $db->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute([
            'email' => $email,
        ]);

        $user = $query->fetch();

        if($user) {
            if(password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;

    }

    private function postIsValide()
    {
        $email = $this->request->get('email');
        $password = $this->request->get('password');


        if($email == '' || $password == '') {
            return false;
        }
        return true;

    }

    public function dashboard()
    {
        if(!$this->session->get('user')) {
            return $this->redirect('login', 302, 'error', 'Vous devez être connecté pour accéder à cette page.');
        }
        $this->render('auth/admin-dashboard',
            [
                'session' => $this->session->get('admin'),
                'title' => 'Dashboard',
                'message' => 'Welcome to your dashboard.',
            ], 'admin');
    }

}