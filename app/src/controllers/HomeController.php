<?php

//require_once dirname(__DIR__, 1).'/core/BaseController.php';
require dirname(__DIR__, 2)."/vendor/autoload.php";
require dirname(__DIR__, 1). "/core/BaseController.php";

class HomeController extends BaseController
{
    public function index()
    {
        // require __DIR__ . '/../views/home/index.php';
        $this->render('home/index');
    }
}
