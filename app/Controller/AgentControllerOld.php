<?php declare(strict_types=1);

namespace App\Controller;

use Core\Token\Token;
use Core\Database\Connection;
use Core\Controller\BaseController;
use Core\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;
use Core\Auth\LoginFormAuthenticator as Authenticator;



class AgentController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function show()
    {   
        $pdo =  $this->connection; 
        $query = (new QueryBuilder())
        ->select('*')->from('agent');
        $pdoStatement = $pdo->prepare($query->getQuery());
        $pdoStatement->execute();
        $agents = $pdoStatement->fetchAll(\PDO::FETCH_ASSOC);      
        
            $this->render('agent/show', [        
            'session' => $this->session->get('admin'),
            'title' => 'Dashboard | liste des agents',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),  
            'agents' => $agents,          
        ], 'dashboard');
    }
   
    /**
     * Undocumented function
     *
     * @return void
     */
    public function store()
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
                'specialite' => strip_tags($specialite)              
            ];
            $this->createAgent($datas);

            return $this->redirect('Dashboard', 302, 'success', 'Agent créé avec succès'); 

        }
        
    }

    public function edition(){
        if(!$this->session->get('user')){
            $this->redirect('/login');
        }
        dump($this->request->query->get('id'));
        $pdo =  $this->connection; 
        $id = $this->request->get('id');
        $query = (new QueryBuilder())
        ->select('*')->from('agent')->where('id', '=', $id);
        $pdoStatement = $pdo->prepare($query->getQuery());
        $pdoStatement->execute();
        $agent = $pdoStatement->fetch(\PDO::FETCH_ASSOC);
        $this->render('agent/edition', [      
            'title' => 'Dashboard | Edition agent',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),
            'agent' => $agent,
        ], 'dashboard');
    }


    public function add(){
        $pdo =  $this->connection; 
        $id = $this->request->get('id');
        $query = (new QueryBuilder())
        ->select('*')->from('agent')->where('id', '=', $id);
        $pdoStatement = $pdo->prepare($query->getQuery());
        $pdoStatement->execute();
        $agent = $pdoStatement->fetch(\PDO::FETCH_ASSOC);
        $this->render('agent/add', [      
            'title' => 'Dashboard | Edition agent',
            'message' => 'Добро пожаловать в вашу панель управления.',           
            'user' => $this->session->get('user'),
            'form'=> Authenticator::createAgent(),
        ], 'dashboard');
    }
   

    /**
     * Undocumented function
     *
     * @return void
     */
    private function createAgent($datas)
    {
        $pdo =  $this->connection; 
        $token = $this->request->get('token');         ;   
        if(Token::isTokenValidInSession( $token)):
        $sql = 'INSERT INTO agent (nom, prenom, date_naissance, code_identification, nationalite, specialite, created, modified) 
        VALUES (:nom, :prenom, :date_naissance, :code_identification, :nationalite, :specialite, NOW(), NOW())';
        $stmt = $pdo->prepare($sql);
        $stmt->execute($datas);
        
        endif;               
                    
    }




    /**Update methode */
    public function update()
    {
       
        if($this->request->isMethod('post'))
        {  
            $id = $this->request->get('id');
            $nom = $this->request->get('nom');
            $prenom = $this->request->get('prenom');
            $date_naissance     = $this->request->get('date_naissance');
            $code_identification    = $this->request->get('code_identification');
            $nationalite   = $this->request->get('nationalite');
            $specialite  = $this->request->get('specialite');
            $token = $this->request->get('token');
            $datas = [
                'id' => strip_tags($id),
                'nom' => strip_tags($nom),
                'prenom' => strip_tags($prenom),
                'date_naissance' => strip_tags($date_naissance),
                'code_identification' => strip_tags($code_identification),
                'nationalite' => strip_tags($nationalite),
                'specialite' => strip_tags($specialite)              
            ];
            $this->updateAgent($datas);

            return $this->redirect('create-agent', 302, 'success', 'Agent modifié avec succès'); 

        }
        
        
    }


    /** Read Methode */
    public function read()
    {
        if($this->request->isMethod('post')){  
            $id = $this->request->get('id');
            $token = $this->request->get('token');
            $datas = [
                'id' => $id,
            ];
            $this->readAgent($datas);

            return $this->redirect('create-agent', 302, 'success', 'Agent lu avec succès'); 

        }
        return $this->redirect('Dashboard', 302, 'error', 'vous n\'avez pas le droit d\'accéder à cette page');
        
    }


    private function readAgent($datas)
    {
        $pdo =  $this->connection; 
        $token = $this->request->get('token');         ;   
        if(Token::isTokenValidInSession( $token)):
        $sql = 'SELECT * FROM agent WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute($datas);
        endif;               
                    
    }


    /** Delete Methode */
    public function delete()
    {
        if($this->request->isMethod('post')){  
            $id = $this->request->get('id');
            $token = $this->request->get('token');
            $datas = [
                'id' => $id,
            ];
            $this->deleteAgent($datas);
            return $this->redirect('create-agent', 302, 'success', 'Agent supprimé avec succès'); 

        }
        return $this->redirect('Dashboard', 302, 'error', 'vous n\'avez pas le droit d\'accéder à cette page');
        
    }

    private function deleteAgent($datas)
    {
        $pdo =  $this->connection; 
        $token = $this->request->get('token');         ;   
        if(Token::isTokenValidInSession( $token)):
        $sql = 'DELETE FROM agent WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute($datas);
        endif;               
                    
    }

    
}
