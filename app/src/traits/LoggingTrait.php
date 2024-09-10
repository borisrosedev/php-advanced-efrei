<?php 


trait LoggingTrait {
    public function logMessage(string $message): void {
        echo "Log: $message";
    }
}