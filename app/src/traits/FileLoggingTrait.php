<?php
namespace App\Traits;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
require dirname(__DIR__, 2). "/vendor/autoload.php";



trait FileLoggingTrait {
    public function fileLogMessage($filename, $message, $type = "DEBUG") {
        $log = new Logger('env');
        $log->pushHandler(new StreamHandler(dirname(__DIR__, 1)."/logs/$filename.log"));
        
        switch ($type) {
            case "INFO":
                $log->info("[INFO]: $message");
                break;
            case "DEBUG":
                $log->debug("[DEBUG]: $message");
                break;
            default:
                $log->error("[ERROR]: $message");
                break;
        }
      
     
    }
}