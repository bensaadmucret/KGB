<?php declare(strict_types=1);

namespace App\Controller;

use Core\Controller\BaseController;
use Core\Auth\LoginFormAuthenticator as Authenticator;
use Symfony\Component\HttpFoundation\RedirectResponse;


class AgentController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function show()
    {   
            
       $agents = $this->model->getAll('agent'); 
      
            $this->render('agent/show', [        
            
            'title' => 'Dashboard | liste des agents',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),  
            'agents' => $agents,          
        ], 'dashboard');
    }



    public function add()
    {
        check_is_logged_in();

        if($this->request->isMethod('post')){  
            $nom = $this->request->get('nom');
            $prenom = $this->request->get('prenom');
            $date_naissance     = $this->request->get('date_naissance');
            $code_identification    = $this->request->get('code_identification');
            $nationalite   = $this->request->get('nationalite');
            $specialite  = $this->request->get('specialite');
            $token = $this->request->get('token');
            $datas = [
                'nom' => strip_tags($nom),
                'prenom' => strip_tags($prenom),
                'date_naissance' => strip_tags($date_naissance),
                'code_identification' => strip_tags($code_identification),
                'nationalite' => strip_tags($nationalite),
                'specialite' => strip_tags($specialite),
                'created_at' => date('Y-m-d H:i:s'),                
            ];
            $this->model->insert('agent', $datas);
            return $this->redirect('agent-show', 302, 'success', 'Agent ajouté avec succès');
        }

        $this->render('agent/add', [        
            
            'title' => 'Dashboard | Ajouter un agent',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),
            'form' => Authenticator::createAgent(),  
        ], 'dashboard');
    }
    


    public function edit()
    {
        if($this->request->isMethod('get')){
            $this->redirect('agent-show', 302, 'error', 'Vous ne pouvez pas accéder à cette page de cette façon!');
        }       
        $id = $this->request->get('id');
        $agent = $this->model->find('agent', $id);
        
        $this->render('agent/edition', [       
          
            'title' => "Dashboard | Mise à jour d'un agent",
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),
            'agent'=>$agent,           
            
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
            $this->model->update('agent', $datas);
           return $this->redirect('agent-show', 302, 'success', 'Agent mis à jour avec succès');
                                 
        
        }
        
        return $this->redirect('agent-show', 302, 'error', 'Vous ne pouvez pas accéder à cette page de cette façon!'); 
    
    }
    
    public function delete()
    {
        check_is_logged_in();
        if($this->request->isMethod('post')){
            $id = $this->request->get('id');
            $this->model->delete('agent', $id);
            return $this->redirect('agent-show', 302, 'success', 'Agent supprimé avec succès');
        }
        return $this->redirect('agent-show', 302, 'error', 'Vous ne pouvez pas accéder à cette page de cette façon!');
    }
}