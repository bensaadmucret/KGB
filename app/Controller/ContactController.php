<?php declare(strict_types=1);

namespace App\Controller;

use Core\Token\Token;
use Core\Controller\BaseController;
use Core\Auth\LoginFormAuthenticator as Authenticator;



class ContactController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function show()
    {   
            
       $contacts = $this->model->getAll('contact'); 
           $this->render('contact/show', [        
            
            'title' => 'Dashboard | liste des contacts',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),  
            'contacts' => $contacts, 
            'token' => Token::generateToken($this->session),            
        ], 'dashboard');
    }



    public function add()
    {
        check_is_logged_in();      
        $token = $this->request->get('token');     
        if($this->request->isMethod('post') && Token::isTokenValidInSession( $token)){  
            $nom = $this->request->get('nom');
            $prenom = $this->request->get('prenom');
            $date_naissance     = $this->request->get('date_naissance');
            $code_identification    = $this->request->get('code_identification');
            $nationalite   = $this->request->get('nationalite');         
           
            $datas = [
                'nom' => strip_tags($nom),
                'prenom' => strip_tags($prenom),
                'date_naissance' => strip_tags($date_naissance),
                'code_identification' => strip_tags($code_identification),
                'nationalite' => strip_tags($nationalite)              
                          
            ];
            $this->model->insert('contact', $datas);
            return $this->redirect('contact-show', 302, 'success', 'contact ajouté avec succès');
        }

        $this->render('contact/add', [        
            
            'title' => 'Dashboard | Ajouter un contact',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),
            'form' => Authenticator::createcontact(),  
        ], 'dashboard');
    }
    


    public function edit()
    {   check_is_logged_in();  
        
        if($this->request->isMethod('get')){
            $this->redirect('contact-show', 302, 'error', 'Vous ne pouvez pas accéder à cette page de cette façon!');
        }       
        $id = $this->request->get('id');
        $contact = $this->model->find('contact', $this->request->get('id'));
        
        $this->render('contact/edition', [       
          
            'title' => 'Dashboard | Mise à jour d\'une contact',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),
            'contact'=>$contact, 
                 
            
        ], 'dashboard');

    }


    public function update()
    {
        check_is_logged_in();
       
        if($this->request->isMethod('get')){
            $this->redirect('contact-show', 302, 'error', 'Vous ne pouvez pas accéder à cette page de cette façon!');
        }
        
        if($this->request->isMethod('post')){ 
            $id = $this->request->get('id'); 
            $nom = (string)$this->request->get('nom');
            $prenom =  (string)$this->request->get('prenom');
            $date_naissance     = $this->request->get('date_naissance');
            $code_identification    = (string) $this->request->get('code_identification');
            $nationalite   = (string)$this->request->get('nationalite');         
            $datas = [
                'nom' => strip_tags($nom),
                'prenom' => strip_tags($prenom),
                'date_naissance' => strip_tags($date_naissance),
                'code_identification' => strip_tags($code_identification),
                'nationalite' => strip_tags($nationalite),              
                'id' => $id,                               
            ];
            $this->model->update('contact', $datas);
            return $this->redirect('contact-show', 302, 'success', 'contact modifié avec succès');
          
        }
       
        return $this->redirect('contact-show', 302, 'error', 'Une erreur est survenue');   
     
    }

    public function delete()
    {
        
        check_is_logged_in();
        $token = $this->request->get('token');
        if($this->request->isMethod('post')  && Token::isTokenValidInSession( $token)){
            $id = $this->request->get('id');
            $this->model->delete('contact', $id);
            return $this->redirect('contact-show', 302, 'success', 'contact supprimé avec succès');
        }
        return $this->redirect('contact-show', 302, 'error', 'Une erreur est survenue');
    }
    
}