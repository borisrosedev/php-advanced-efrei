<?php
namespace App\Controllers;

use App\Core\BaseController;

// require_once  dirname(__DIR__, 1).'/core/BaseController.php';

class ContactController extends BaseController
{
    public function index()
    {
        $this->render('contact/index');
    }
}
