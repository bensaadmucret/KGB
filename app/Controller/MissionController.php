<?php declare(strict_types=1);

namespace App\Controller;

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

     /**createfunction add with titre,description, nom de code, pays, agents, contacts, cibles, type de mission :surveillance, assassinat, infiltration */
    public function add()
    {
        check_is_logged_in();

        if($this->request->isMethod('post')){  
            $titre = $this->request->get('titre');
            $description = $this->request->get('description');
            $nom_code = $this->request->get('nom_code');
            $pays = $this->request->get('pays');
            $agents = $this->request->get('agents');
            $contacts = $this->request->get('contacts');
            $cibles = $this->request->get('cibles');
            $type_mission = $this->request->get('type_mission');
            $token = $this->request->get('token');
            $datas = [
                'titre' => strip_tags($titre),
                'description' => strip_tags($description),
                'code' => strip_tags($nom_code),
                'pays' => strip_tags($pays),
                'agent' => strip_tags($agents),
                'contact' => strip_tags($contacts),
                'cible' => strip_tags($cibles),
                'type' => strip_tags($type_mission),
                'Date' => date('Y-m-d H:i:s'),                
            ];
            $this->model->insert('mission', $datas);
            return $this->redirect('mission-show', 302, 'success', 'Mission ajouté avec succès');
        }

        $this->render('mission/add', [
            'title' => 'Dashboard | liste des missions',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),
            'form' => Authenticator::createMission(),  
                     
        ], 'dashboard');
    }

}