<?php declare(strict_types=1);

namespace App\Controller;

use Core\Model\Model;
use Core\Token\Token;
use Core\Controller\BaseController;
use Core\Auth\LoginFormAuthenticator as Authenticator;

class PlanqueController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function show()
    {
        check_is_logged_in();
        $planques = $this->model->getAll('planque');
        $this->render('planque/show', [
            'title' => 'Dashboard | liste des planques',
            'message' => 'Добро пожаловать в вашу панель управления.',
            'user' => $this->session->get('user'),
            'planques' => $planques,
        ], 'dashboard');
        
    }

    public function add()
    {
        check_is_logged_in();
      
        if($this->request->isMethod('post')){
            $type = $this->request->get('type_de_planque');
            $adresse = $this->request->get('adresse');
            $pays = $this->request->get('pays');
            $code = $this->request->get('code');
            $token = $this->request->get('token');
    
            $datas = [
                'code' => strip_tags($code),
                'adresse' => strip_tags($adresse),
                'pays' => strip_tags($pays),
                'type_de_planque' => strip_tags($type),

            ];
            if(Token::isTokenValidInSession($token)):
                $this->model->insert('planque', $datas);
                return $this->redirect('planque-show', 302, 'success', 'planque ajouté avec succès');
            else:
                $this->session->set('error', 'Une erreur est survenue');
                $this->redirect('planque-show', 302);
                return $this->redirect('planque-add', 302, 'error', 'Une erreur est survenue');
            
            endif;
        }
        $this->render('planque/add', [
            'title' => 'Dashboard | Ajouter une planque',
            'message' => 'Добро пожаловать в вашу панель управления.',
            'form' => Authenticator::createPlanque(),
            'user' => $this->session->get('user'),
        ], 'dashboard');
        
    }

    public function edit()
    {
        check_is_logged_in();
        if($this->request->isMethod('post')){
        $id = $this->request->get('id');
        $planque = $this->model->getOne('planque', $id);
        $this->render('planque/edition', [
            'title' => 'Dashboard | liste des planques',
            'message' => 'Добро пожаловать в вашу панель управления.',
            'user' => $this->session->get('user'),
            'planque' => $planque,
        ], 'dashboard');
        }
        return $this->redirect('planque-show', 302);
    }

    public function update(){
        check_is_logged_in();
        if($this->request->isMethod('post')){
        $id = $this->request->get('id');
        $type = $this->request->get('type_de_planque');
        $adresse = $this->request->get('adresse');
        $pays = $this->request->get('pays');
        $code = $this->request->get('code');
        $token = $this->request->get('token');
        $datas = [
            'type_de_planque' => strip_tags($type),
            'adresse' => strip_tags($adresse),
            'pays' => strip_tags($pays),
            'type_de_planque' => strip_tags($type),
            'code' => strip_tags($code),
            'id' => strip_tags($id),

        ];
        if(Token::isTokenValidInSession($token)):
            $this->model->update('planque', $datas);
            return $this->redirect('planque-show', 302, 'success', 'planque modifié avec succès');
        else:
            $this->session->set('error', 'Une erreur est survenue');
            $this->redirect('planque-show', 302);
            return $this->redirect('planque-add', 302, 'error', 'Une erreur est survenue');
        endif;
        }
        return $this->redirect('planque-show', 302);
    }

    public function delete($id)
    {
        check_is_logged_in();
        if($this->request->isMethod('post')):
            $id = $this->request->get('id');
            $this->model->delete('planque', $id);
            return $this->redirect('planque-show', 302, 'success', 'planque supprimé avec succès');
        endif;

    }


}