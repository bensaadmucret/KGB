<?php

namespace mzb\controller;

use mzb\Controller\Controller;

class Wellcome extends Controller
{
    public function index()
    {
        $data = ['welcome, word'] ;
        $this->render('/wellcome/index', compact('data'));
    }

    public function test()
    {
        $title = 'Test';
        $this->render('/wellcome/index', compact('title'));
    }
}
