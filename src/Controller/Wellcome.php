<?php


namespace mzb\controller;

use mzb\Forms\Form;
use mzb\Controller\Controller;

class Wellcome extends Controller
{
    public function index()
    {
        $data = ['welcome, JT'] ;
        $form = new Form();
        $form->start_form('#', 'post', 'Wellcome', [ 'class'=>'form-control', ])
                ->addFor('name', 'text')->addText('name', '', [ 'class'=>'form-control', ])
                ->addFor('email', 'text')->addText('email', '', [ 'class'=>'form-control', ])
                ->addFor('message', 'textarea')->addText('message', '', [ 'class'=>'form-control', ])
                ->addFor('message2', 'textarea2')->addText('message2', '', [ 'class'=>'form-control', ])
           
                ->addBouton(
                    'submit',
                    ['class'=>'btn-primary btn mb-3 mt-3']
                )
                ->end_form();
               
            
        //var_dump($form) ;
        $this->render('/wellcome/index', compact('data', 'form'));
    }

  

    public function test()
    {
        $data = ['welcome'];

        $this->render('/wellcome/test', compact('data'));
    }
}
