<?php declare(strict_types=1);

namespace App\Controller;

use Core\Controller\BaseController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends BaseController
{
    public function __contruct()
    {
        parent::__construct();
    }

    public function index()
    {
        $missions = $this->model->getAll('mission');
       
        return  $this->render('home/index', [
            'title' => 'Dashboard | liste des missions',
            'message' => 'Добро пожаловать в вашу панель управления.',
            'missions' => $missions,
        ], 'default');
    }

    

    
}
