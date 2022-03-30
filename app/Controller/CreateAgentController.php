<?php declare(strict_types=1);

namespace App\Controller;

use Core\Token\Token;
use Core\Database\Connection;
use Core\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;



class CreateAgentController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

   
    /**
     * Undocumented function
     *
     * @return void
     */
    public function store()
    {
        if($this->request->isMethod('post')){  
            dump($this->request);
            $nom = $this->request->get('nom');
            $prenom = $this->request->get('prenom');
            $date_naissance     = $this->request->get('date_naissance');
            $code_identification    = $this->request->get('code_identification');
            $nationalite   = $this->request->get('nationalite');
            $specialite  = $this->request->get('specialite');
            $token = $this->request->get('token');
            $datas = [
                'nom' => $nom,
                'prenom' => $prenom,
                'date_naissance' => $date_naissance,
                'code_identification' => $code_identification,
                'nationalite' => $nationalite,
                'specialite' => $specialite              
            ];
            $this->createAgent($datas);

            return $this->redirect('create-agent', 302, 'success', 'Agent créé avec succès'); 

        }
        return $this->redirect('Dashboard', 302, 'error', 'vous n\'avez pas le droit d\'accéder à cette page');
        
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
        $sql = 'INSERT INTO agent (nom, prenom, date_naissance, code_identification, nationalite, specialite) VALUES (:nom, :prenom, :date_naissance, :code_identification, :nationalite, :specialite)';
            $statement->execute($datas); 
        endif;               
                    
    }


    /**Update methode */
    public function update()
    {
        if($this->request->isMethod('post')){  
            $id = $this->request->get('id');
            $nom = $this->request->get('nom');
            $prenom = $this->request->get('prenom');
            $date_naissance     = $this->request->get('date_naissance');
            $code_identification    = $this->request->get('code_identification');
            $nationalite   = $this->request->get('nationalite');
            $specialite  = $this->request->get('specialite');
            $token = $this->request->get('token');
            $datas = [
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'date_naissance' => $date_naissance,
                'code_identification' => $code_identification,
                'nationalite' => $nationalite,
                'specialite' => $specialite              
            ];
            $this->updateAgent($datas);

            return $this->redirect('create-agent', 302, 'success', 'Agent modifié avec succès'); 

        }
        return $this->redirect('Dashboard', 302, 'error', 'vous n\'avez pas le droit d\'accéder à cette page');
        
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
            $statement->execute($datas); 
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
            $statement->execute($datas); 
        endif;               
                    
    }

    
}
