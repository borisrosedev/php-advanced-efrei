<?php
namespace App\Middleware;

use Exception;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class ErrorHandler {
    private $log;

    public function __construct() {
        $this->log = new Logger('error_logger');
        $this->log->pushHandler(new StreamHandler(__DIR__ . '/../logs/middleware-error.log', Logger::ERROR));
    }


    public function handleException(Exception $exception) {
        // Loguer l'exception
        $this->log->error($exception->getMessage(), [
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTraceAsString()
        ]);

        if (getenv('APP_ENV') === 'development') {
            echo "Exception : " . $exception->getMessage();
            echo " in " . $exception->getFile() . " on line " . $exception->getLine();
        } else {
          
            echo "Une erreur est survenue. Veuillez réessayer plus tard.";
        }
    }

    public static function register() {
        $handler = new self();
        set_exception_handler([$handler, 'handleException']);
    }
}
