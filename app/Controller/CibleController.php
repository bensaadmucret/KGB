<?php declare(strict_types=1);

namespace App\Controller;

use Core\Token\Token;
use Core\Controller\BaseController;
use Core\Auth\LoginFormAuthenticator as Authenticator;



class CibleController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function show()
    {   
            
       $cibles = $this->model->getAll('cible'); 
           $this->render('cible/show', [        
            
            'title' => 'Dashboard | liste des cibles',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),  
            'cibles' => $cibles, 
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
            $this->model->insert('cible', $datas);
            return $this->redirect('cible-show', 302, 'success', 'cible ajouté avec succès');
        }

        $this->render('cible/add', [        
            
            'title' => 'Dashboard | Ajouter un cible',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),
            'form' => Authenticator::createCible(),  
        ], 'dashboard');
    }
    


    public function edit()
    {   check_is_logged_in();  
        
        if($this->request->isMethod('get')){
            $this->redirect('cible-show', 302, 'error', 'Vous ne pouvez pas accéder à cette page de cette façon!');
        }       
        $id = $this->request->get('id');
        $cible = $this->model->find('cible', $this->request->get('id'));
        
        $this->render('cible/edition', [       
          
            'title' => 'Dashboard | Mise à jour d\'une cible',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),
            'cible'=>$cible, 
            'token' => Token::generateToken($this->session),          
            
        ], 'dashboard');

    }


    public function update()
    {
        check_is_logged_in();
        $token = $this->request->get('token');
        if($this->request->isMethod('get') && Token::isTokenValidInSession( $token)){
            $this->redirect('cible-show', 302, 'error', 'Vous ne pouvez pas accéder à cette page de cette façon!');
        }
        $token = $this->request->get('token');
        if($this->request->isMethod('post') && Token::isTokenValidInSession( $token)){ 
            
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
            $this->model->update('cible', $datas);
            return $this->redirect('cible-show', 302, 'success', 'cible modifié avec succès');
                                 
        
        }
       
        return $this->redirect('cible-show', 302, 'error', 'Une erreur est survenue');   
     
    }

    public function delete()
    {
        
        check_is_logged_in();
        $token = $this->request->get('token');
        if($this->request->isMethod('post')  && Token::isTokenValidInSession( $token)){
            $id = $this->request->get('id');
            $this->model->delete('cible', $id);
            return $this->redirect('cible-show', 302, 'success', 'cible supprimé avec succès');
        }
        return $this->redirect('cible-show', 302, 'error', 'Une erreur est survenue');
    }
    
}