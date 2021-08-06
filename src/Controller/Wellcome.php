<?php declare(strict_types=1);


namespace mzb\controller;

use mzb\Controller\Controller;

class Wellcome extends Controller
{
    public function index()
    {
        $data = ['welcome, JT'] ;
        $this->render('/wellcome/index', compact('data'));
    }

  

    public function test()
    {
        $data = ['welcome', 'Mohammed le zouzou'];
      

        $this->render('/wellcome/test', compact(['data']));
    }
}
