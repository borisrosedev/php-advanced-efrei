<?php 
namespace App\Controllers;
use App\Core\BaseController;
use App\Traits\CacheData;
use App\Traits\CookyData;
use App\Traits\SessionData;

require dirname(__DIR__, 2) . '/vendor/autoload.php';

class LogoutController extends BaseController {

    use CacheData, SessionData {
        CacheData::flushDataInMemory as flushMemo;
        SessionData::deleteCookiesAndDestroySession as flushBrowser;
    }
    public function index() {
        $this->flushBrowser();
        $this->flushMemo($this->memoryDb);
        return $this->render('logout/index');
    }
}