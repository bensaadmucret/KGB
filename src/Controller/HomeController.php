<?php

namespace mzb\Controller;
use mzb\Container\Container;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->render('wellcome/index');
    }
}
