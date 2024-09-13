<?php 
namespace App\Traits;

trait LoggingTrait {
    public function logMessage(string $message): void {
        echo "Log: $message";
    }
}