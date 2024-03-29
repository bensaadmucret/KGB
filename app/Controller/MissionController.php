<?php declare(strict_types=1);

namespace App\Controller;

use Core\Model\Model;
use Core\Controller\BaseController;
use Core\Auth\LoginFormAuthenticator as Authenticator;


class MissionController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function show()
    {   
            
       $missions = $this->model->getAll('mission'); 
       
            $this->render('mission/show', [        
            
            'title' => 'Dashboard | liste des missions',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),  
            'missions' => $missions,          
        ], 'dashboard');
    }



    public function add()
    {
        check_is_logged_in();
        $model = new Model();
        $cible = $model->getAll('cible');
        $agent = $model->getAll('agent');
        $contact = $model->getAll('contact');
      
         
         
       
      
            
       
        if($this->request->isMethod('post')){  
            $nom = $this->request->get('nom');
            $prenom = $this->request->get('prenom');
            $date_naissance     = $this->request->get('date_naissance');
            $code_identification    = $this->request->get('code_identification');
            $nationalite   = $this->request->get('nationalite');
            $specialite  = $this->request->get('specialite');
            $pays = $this->request->get('pays');
            $token = $this->request->get('token');

            if(Token::isTokenValidInSession($token)):
            $datas = [
                'nom' => strip_tags($nom),
                'prenom' => strip_tags($prenom),
                'date_naissance' => strip_tags($date_naissance),
                'code_identification' => strip_tags($code_identification),
                'nationalite' => strip_tags($nationalite),
                'specialite' => strip_tags($specialite),
                'pays' => strip_tags($pays)
                            
            ];
            $this->model->insert('mission', $datas);
            return $this->redirect('mission-show', 302, 'success', 'mission ajouté avec succès');
            else: return $this->redirect('mission-show', 302, 'error', 'token invalide');
            endif;
        }
    
        $this->render('mission/add', [        
            
            'title' => 'Dashboard | Ajouter un mission',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),
            'form' => Authenticator::createMission(),
            'cible' => $cible,
            'contact' => $contact,
            'agent' => $agent,
            
           
        ], 'dashboard');
    }
    


    public function edit()
    {
        if($this->request->isMethod('get')){
            $this->redirect('mission-show', 302, 'error', 'Vous ne pouvez pas accéder à cette page de cette façon!');
        }       
        $id = $this->request->get('id');
        $mission = $this->model->getOne('mission', $id);
        
        $this->render('mission/edition', [       
          
            'title' => "Dashboard | Mise à jour d'un mission",
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),
            'mission'=>$mission,           
            
        ], 'dashboard');
        

    }


    public function update()
    {
        check_is_logged_in();
       
        if($this->request->isMethod('post')){ 
            
            $id = $this->request->get('id'); 
            $nom = (string)$this->request->get('nom');
            $prenom =  (string)$this->request->get('prenom');
            $date_naissance     = $this->request->get('date_naissance');
            $code_identification    = (string) $this->request->get('code_identification');
            $nationalite   = (string)$this->request->get('nationalite');
            $specialite  = $this->request->get('specialite'); 
            $updated_at = (new \DateTime())->format('Y-m-d');          
            $datas = [
                'nom' => strip_tags($nom),
                'prenom' => strip_tags($prenom),
                'date_naissance' => $date_naissance,
                'code_identification' => strip_tags($code_identification),
                'nationalite' => strip_tags($nationalite),
                'specialite' => strip_tags($specialite),              
                'updated_at' => (new \DateTime())->format('Y-m-d'),
                'id' => $id,                               
            ];
            $this->model->update('mission', $datas);
           return $this->redirect('mission-show', 302, 'success', 'mission mis à jour avec succès');
                                 
        
        }
        
        return $this->redirect('mission-show', 302, 'error', 'Vous ne pouvez pas accéder à cette page de cette façon!'); 
    
    }
    
    public function delete()
    {
        check_is_logged_in();
        if($this->request->isMethod('post')){
            $id = $this->request->get('id');
            $this->model->delete('mission', $id);
            return $this->redirect('mission-show', 302, 'success', 'mission supprimé avec succès');
        }
        return $this->redirect('mission-show', 302, 'error', 'Vous ne pouvez pas accéder à cette page de cette façon!');
    }
}