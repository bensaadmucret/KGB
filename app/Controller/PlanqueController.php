<?php declare(strict_types=1);

namespace App\Controller;

use Core\Model\Model;
use Core\Controller\BaseController;
use Core\Auth\LoginFormAuthenticator as Authenticator;

class PlanqueController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $planques = $this->model->getAll('planque');
        $this->render('planque/index', [
            'title' => 'Dashboard | liste des planques',
            'message' => 'Добро пожаловать в вашу панель управления.',
            'user' => $this->session->get('user'),
        ], 'dashboard');
        
    }

    public function add()
    {
        check_is_logged_in();

        if($this->request->isMethod('post')){
            $nom = $this->request->get('nom');
            $adresse = $this->request->get('adresse');
            $pays = $this->request->get('pays');
            $type = $this->request->get('type');
            $code = $this->request->get('code');
            $token = $this->request->get('token');
            $datas = [
                'nom' => strip_tags($nom),
                'adresse' => strip_tags($adresse),
                'pays' => strip_tags($pays),
                'type' => strip_tags($type),
                'code' => strip_tags($code),

            ];
            if($token === $this->session->get('token')){
                $this->model->insert('planque', $datas);
                return $this->redirect('planque-index', 302, 'success', 'planque ajouté avec succès');
            } else {
                $this->session->set('error', 'Une erreur est survenue');
                $this->redirect('planque-show', 302);
                return $this->redirect('planque-add', 302, 'error', 'Une erreur est survenue');
            }
            return $this->redirect('planque-index');
        }
        $this->render('planque/add', [
            'title' => 'Dashboard | Ajouter une planque',
            'message' => 'Добро пожаловать в вашу панель управления.',
            'user' => $this->session->get('user'),
            'token' => $this->session->get('token'),
        ], 'dashboard');
        
    }

    public function edit($id)
    {
        check_is_logged_in();
        $id = $this->request->get('id');
        $planque = $this->model->getOne('planque', $id);
        $this->render('planque/edition', [
            'title' => 'Dashboard | liste des planques',
            'message' => 'Добро пожаловать в вашу панель управления.',
            'user' => $this->session->get('user'),
            'planque' => $planque,
        ], 'dashboard');
    }

    public function delete($id)
    {
        check_is_logged_in();
        if($this->request->isMethod('post')):
            $id = $this->request->get('id');
            $this->model->delete('planque', $id);
            return $this->redirect('planque-index', 302, 'success', 'planque supprimé avec succès');
        endif;

    }


}