<?php

namespace Core\Auth;

use Core\Flash\Flash;
use Core\Token\Token;
use Core\Session\Session;
use Core\FormBuilder\FormBuilder;
use Symfony\Component\HttpFoundation\Request;

class LoginFormAuthenticator 
{   
    
    /**
     * formulaire de connexion
     *
     * @return form
     */
    public static function login()
    { 
        $session = new Session();
        $token = Token::generateToken($session);
       
        $request = new Request;      
        $email = $request->get('email');
        $form = new FormBuilder();

        
        $form->startForm('/login', 'POST', 'login-form');
        $form->addFor( 'Email', '<h4>Votre email</h4>')
        ->addEmail('email',  $email ?? '', ['label' => 'Email', 'required' => true, 'class'=>'form-text', 'autofocus', 'placeholder' => 'exemple@domain.com'])
        ->addFor( 'Password', '<h4>Mot de passe</h4>')
        ->addPassword('password', '', ['label' => 'Password', 'required'=> true,  'class'=>'form-text','placeholder' => 'votre mot de passe'])
        ->addToken( $token)
        ->addBouton('Envoyer', ['class'=>'btn-primary btn mb-3 mt-3 form-button wow fadeInUp animated'])
        ->endForm();
        return $form;
    }

    public static function createAgent()
    {
        $session = new Session();
        $token = Token::generateToken($session); 
        
        $form = new FormBuilder();


        
        $form->startForm('agent-add', 'POST', 'create form');
        $form->addFor( 'Nom', '<h4 class="m-3">Nom</h4>')
        ->addText('nom', '', ['label' => 'Nom', 'required' => true, 'class'=>'form-control ', 'autofocus', 'placeholder' => 'имя'])
        ->addFor( 'Prenom', '<h4 class="m-3">Prenom</h4>')
        ->addText('prenom', '', ['label' => 'Prenom', 'required'=> true,  'class'=>'form-control','placeholder' => 'Имя'])
        ->addFor( 'Date de naissance', '<h4 class="m-3">Date de naissance</h4>')
        ->addDate('date_naissance', '', ['label' => 'Date de naissance', 'required'=> true,  'class'=>'form-control','placeholder' => 'Дата рождения'])
        ->addFor( 'Code d\'identification', '<h4 class="m-3">Code d\'identification</h4>')
        ->addNumber('code_identification', '', ['label' => 'Code d\'identification', 'required'=> true,  'class'=>'form-control','placeholder' => 'закодированный'])
        ->addFor( 'Nationalité', '<h4 class="m-3">Nationalité</h4>')
        ->addText('nationalite', '', ['label' => 'Nationalité', 'required'=> true,  'class'=>'form-control','placeholder' => 'Национальность'])
        ->addFor( 'Spécialité', '<h4 class="m-3">Spécialité</h4>')
        ->addText('specialite', '', ['label' => 'Spécialité', 'required'=> true,  'class'=>'form-control','placeholder' => 'специальность'])
        ->addToken( $token)
        ->addBouton('Envoyer', ['class'=>'btn-primary btn mb-3 mt-3 form-button wow fadeInUp animated'])
        ->endForm();
        return $form;
    }

    /**create form with titre,description, nom de code, pays, agents, contacts, cibles, type de mission :surveillance, assassinat, infiltration */

    public static function createMission()
    {
        $session = new Session();
        $token = Token::generateToken($session); 
        
        $form = new FormBuilder();

        $form->startForm('mission-add', 'POST', 'create form');
        $form->addFor( 'Titre', '<h4 class="m-3">Titre</h4>')
        ->addText('titre', '', ['label' => 'Titre', 'required'=> true,  'class'=>'form-control','placeholder' => 'Название'])
        ->addFor( 'Description', '<h4 class="m-3">Description</h4>')
        ->addTextarea('description', ['label' => 'Description', 'rows'=>"10",  'class'=>'form-control summernote','placeholder' => 'Описание'])
        ->addFor( 'Nom de code', '<h4 class="m-3">Nom de code</h4>')
        ->addText('nom_code', '', ['label' => 'Nom de code', 'required'=> true,  'class'=>'form-control','placeholder' => 'Имя кода'])
        ->addFor( 'Pays', '<h4 class="m-3">Pays</h4>')
        ->addText('pays', '', ['label' => 'Pays', 'required'=> true,  'class'=>'form-control','placeholder' => 'Страна'])
        ->addFor( 'Agents', '<h4 class="m-3">Agents</h4>')
        ->addText('agents', '', ['label' => 'Agents', 'required'=> true,  'class'=>'form-control','placeholder' => 'Агенты'])
        ->addFor( 'Contacts', '<h4 class="m-3">Contacts</h4>')
        ->addText('contacts', '', ['label' => 'Contacts', 'required'=> true,  'class'=>'form-control','placeholder' => 'Контакты'])
        ->addFor( 'Cibles', '<h4 class="m-3">Cibles</h4>')
        ->addText('cibles', '', ['label' => 'Cibles', 'required'=> true,  'class'=>'form-control','placeholder' => 'Цели'])
        ->addFor( 'Type de mission', '<h4 class="m-3">Type de mission</h4>')
        ->addText('type_mission', '', ['label' => 'Type de mission', 'required'=> true,  'class'=>'form-control','placeholder' => 'Тип миссии'])
        ->addToken( $token)
        ->addBouton('Envoyer', ['class'=>'btn-primary btn mb-3 mt-3 form-button wow fadeInUp animated'])
        ->endForm();
        return $form;
    }


}
