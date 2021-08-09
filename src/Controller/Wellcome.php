<?php



namespace mzb\controller;

use mzb\Forms\Form;
use mzb\Controller\Controller;
use mzb\Security\Csrf;
use Nette\Http\RequestFactory;



use Nette\Http\Response;

class Wellcome extends Controller
{
    public function index()
    {
        session_start();

        $token = new Csrf();
        $token->generateTokenAndSetItToSessionIfNotExists();
        $key = $token->getTokenFromSession();
        $data = ['welcome, JT'] ;
       
        $form = new Form();
        $form->start_form('/', 'post', 'Wellcome', [ 'class'=>'form-control', ])
        ->addFor('email', 'email')->addText('email', '', [ 'class'=>'form-control' ])
        ->addFor('email', 'email')->addEmail('email', '', [ 'class'=>'form-control', 'maxlength'=>'40'])
        ->addFor('password', 'password')->addPassword('password', '', [ 'class'=>'form-control', 'required'=>'true', 'minlength'=>'4'])
        ->addFor('message', 'textarea')->addText('message', '', [ 'class'=>'form-control', ])
        ->addFor('message2', 'textarea2')->addText('message2', '', [ 'class'=>'form-control', ])
        ->addToken($key)
        ->addBouton('submit', ['class'=>'btn-primary btn mb-3 mt-3'])
        ->end_form();
               
            
        //var_dump($form) ;
        $this->render('/wellcome/index', compact('data', 'form'));
    }

  

    public function postFormSucceeded():void
    {
        $factory = new RequestFactory;
        $httpRequest = $factory->fromGlobals();
        $data = $httpRequest->getPost();
        dump($data['email']);
        dump($data['password']);
        dump($data['token']);
    }
}
