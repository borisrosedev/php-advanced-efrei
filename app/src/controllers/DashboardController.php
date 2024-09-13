<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Attributes\Security;
use App\Traits\NavGuard;

// require_once  dirname(__DIR__, 1).'/core/BaseController.php';
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

#[Security("Protected")]
class DashboardController extends BaseController
{
    use NavGuard;
    public function index()
    {
        $this->guard(DashboardController::class, Security::class, $this->memoryDb);
        $this->render('dashboard/index');
    }
}
