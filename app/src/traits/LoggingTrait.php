<?php 


trait LoggingTrait {
    public function logMessage($message) {
        echo "Log: $message";
    }
}