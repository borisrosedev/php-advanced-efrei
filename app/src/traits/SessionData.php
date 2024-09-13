<?php 
namespace App\Traits;
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

trait SessionData {

    use CookyData;
    public function saveDataInSession($data) {
        echo "data";
        print_r($data);
        foreach($data as $key => $value) {
            if(!is_null($value) && !is_numeric($key)) {
                if($key == "password") {
                    continue;
                }
                $_SESSION[$key] = $value;
            }
          
        }
    }

    public function deleteCookiesAndDestroySession() {
        $this->deleteCookies($_SESSION);
        session_unset();
        session_destroy();   
    }


    
}