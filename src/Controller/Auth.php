<?php


namespace mzb\controller;

use mzb\Forms\Form;
use mzb\Db\Connection;


use mzb\Security\Csrf;
use mzb\Db\QueryBuilder;
use mzb\Security\Session;
use mzb\Validator\Validator;
use mzb\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;



class Auth extends Controller
{
    public function login()
    {
        $session = new Session();
        $session->start();
 

        if($session->get_session('admin')){
            $redirection = new RedirectResponse('dashboard' , 302);
            return $redirection->send();
        }
       
        $token = new Csrf();
        $token->generateTokenAndSetItToSessionIfNotExists();
        $key = $token->getTokenFromSession();
       
        $form = new Form();
        $form->start_form('', 'POST', '', 
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

        // create a function checked $_post valid match with database
        public function checkLogin()
        {
            
          
            try {
              $db =   Connection::get()->connect(); 
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
         

           $query = new QueryBuilder();
              $q = $query->select('*')
                ->from('administrateur');
               
             
            
            $res = $db->query($q);
            $res->setFetchMode(\PDO::FETCH_ASSOC);
            $result = $res->fetch();
         
            $session = new Session();
            $session->start();
            
            $validator = new Validator();
            if($validator->is_email($_POST['email'])){
            
            if($result['email'] == $_POST['email'] 
            && password_verify($_POST['password'], $result['password_admin'])){
                $session->set_session('email', $_POST['email']);
                $session->set_session('admin', 'admin');
              
                $redirection = new RedirectResponse('dashboard', 302);
                return $redirection->send();
            }else{
           
                $redirection = new RedirectResponse('login', 302);
                return $redirection->send();
            }
        }
            
        }

    private function isLogged()
    {
        $session = new Session();
        $session->start();
        if($session->get_session('email') != null){
            return true;
        }else{
            return false;
        }
    }


    public function dashboard()
    {
        if($this->isLogged())
        {
            return $this->render('/admin/dashboard');
        }
        else
        {
            $redirection = new RedirectResponse('login' , 302);
            return $redirection->send();
        }
    }

        
           

    public function logout()
    {
        $session = new Session();
        $session->start();
        $session->destroy_session('admin');
        $session->destroy_session('email');
        $redirection = new RedirectResponse('/' , 302);
            return $redirection->send();
    }
}
