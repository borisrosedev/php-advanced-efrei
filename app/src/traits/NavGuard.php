<?php 
namespace App\Traits;

use ReflectionClass;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';
trait NavGuard {

    use CacheData, SessionData {
        CacheData::flushDataInMemory as flushMemo; 
        SessionData::deleteCookiesAndDestroySession as flushBrowser;
    }
    public function guard($reflectionClass, $attributesClass, $memoryDb) {
     
        $reflect = new ReflectionClass($reflectionClass);
        
        $attributes = $reflect->getAttributes($attributesClass);
     
        if (!empty($attributes)) {
            foreach($attributes as $attribute) {
                $instance = $attribute->newInstance();
                if(property_exists($instance, "defense")){
                    if($instance->defense == "Protected") {
                        if(!isset($_COOKIE["email"])) {
                            $this->flushMemo($memoryDb);
                            $this->flushBrowser();
                            header("Location: ./url?=logout/index");
                            exit(0);
                        }
                    }
                }
            }
        } else {
        
            echo "Aucun attribut trouvé pour la classe {$reflectionClass}" . PHP_EOL;
        }
    }
}
