<?php 
namespace App\Traits;
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';
trait CookyData {
    public function saveDataInCooky(array $data) {
        foreach($data as $key => $value) {
            if(!is_null($value) && !is_numeric($key)){
                if($key == "password") {
                    continue;
                }
                setcookie($key, $value, ["expires" => time() + 1800, "httponly" => true, "samesite" => true]);
            }

        }    
    }

    public function deleteCookies(array $data) {
        foreach($data as $key => $value) {
            setcookie($key, $value, ["expires" => time() - 1800, "httponly" => true, "samesite" => true]); 
        }
    }

}
