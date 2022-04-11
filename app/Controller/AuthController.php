<?php

declare(strict_types=1);


namespace App\Controller;



use Core\Flash\Flash;
use Core\Token\Token;
use Core\Controller\BaseController;
use Core\QueryBuilder\QueryBuilder;
use Core\Auth\LoginFormAuthenticator as Authenticator;
use Symfony\Component\HttpFoundation\RedirectResponse;


class AuthController extends BaseController
{
    
    public function __construct()
    {
        parent::__construct();
        
    }


    /**
     * Authenticate a user with the given credentials.
     *
     * @param Request $request
     * @return bool
     */
    public function login()
    {
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

         
         $this->render('auth/login',
         [   'title' => 'Login',
             'message' => 'Veuillez vous connecter pour accéder à la zone d\'administration..',
             'form' => Authenticator::login(),          
         ], 'admin-login');
        
    }

    public function loginPost($user)
    {  
       
         
        if(!$user) {           
            return $this->redirect('login', 302, 'error', ' Identification invalides.');
          }
         
          if( $this->session->get('verrouiller')){
            return $this->redirect('login', 302, 'error', 'Votre compte est verrouillé.');
          }
           
       $token = $this->request->get('token');      
       if(Token::isTokenValidInSession( $token, $this->session) && $this->postIsValide()) {        
            $this->session->set('user', $user);
             $message = 'Vous êtes maintenant connecté...';
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
     
        $pdo =  $this->connection; 
        $query = (new QueryBuilder())
        ->select('*')->from('administrateur')->where('email = :email');
        $pdoStatement = $pdo->prepare($query->getQuery());
        $pdoStatement->execute([
                    'email' => $email
                ]);

        $user = $pdoStatement->fetch(\PDO::FETCH_ASSOC); 
        

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
        if( $this->session->get('verrouiller')) {
            return $this->redirect('lock-screen', 302, 'error', 'Votre compte est verrouillé.');
          }
        if(!$this->session->get('user')) {           
            return $this->redirect('lock-screen', 302, 'error', 'Vous devez être connecté pour accéder à cette page.');
        }
        $this->render('auth/admin-dashboard',
        [
            'session' => $this->session->get('admin'),
            'title' => 'Dashboard',
            'message' => 'Добро пожаловать в вашу панель управления.',
            'sous_titre' => 'Bienvenue dans votre espace d\'administration.',
            'user' => $this->session->get('user'),
            'form_agent' => Authenticator::createAgent(),
        ], 'dashboard');
    }
    

    public function profile()
    {
        if(!$this->session->get('user')) {           
            return $this->redirect('login', 302, 'error', 'Vous devez être connecté pour accéder à cette page.');
        }
        $this->render('auth/profile',
        [
            'session' => $this->session->get('admin'),
            'title' => 'Profile',
            'message' => 'Добро пожаловать в вашу панель управления.',
            'sous_titre' => 'Bienvenue dans votre espace d\'administration.',
            'user' => $this->session->get('user'),
            'form_agent' => Authenticator::createAgent(),
        ], 'dashboard');
    }

    public function verrouiller()
    {  
        if(!$this->session->get('user')) {           
            return $this->redirect('login', 302, 'error', 'Vous devez être connecté pour accéder à cette page.');
        } 
       $this->session->set('verrouiller', true);
       
        if($this->request->get('password')) {
            $password = $this->request->get('password');          
            $user = $this->session->get('user');           
            if(password_verify($password, $user['password'])) {
                $this->session->remove('verrouiller');
                return $this->redirect('dashboard', 302, 'success', 'Vous êtes maintenant connecté...');
            }            
            return $this->redirect('lock-screen', 302, 'error', 'Mot de passe invalide.');
        }
        if(!$this->session->get('user')) {           
            return $this->redirect('login', 302, 'error', 'Vous devez être connecté pour accéder à cette page.');
        }
        $this->render('auth/verrouiller',
        [            
            'user' => $this->session->get('user'),
        
        ], 'lock');

    }
}