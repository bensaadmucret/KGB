<?php

namespace mzb\Controller;
use mzb\Controller\BaseController;
use mzb\Container\Container;
use mzb\Auth\LoginFormAuthenticator as Authenticator;

class HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->container->get('Session')->set('name', 'mzb');
        $this->render('wellcome/index', ['name' => 'mzb']);
    }

    public function login()
    {
        $this->render('wellcome/login',
            [
                'title' => 'Login',
                'message' => 'Veuillez vous connecter pour accéder à la zone d\'administration..',
                'form' => Authenticator::form(),
            ]);
    }
}
