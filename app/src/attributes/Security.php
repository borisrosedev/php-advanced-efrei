<?php 
namespace App\Attributes;
require_once  dirname(__DIR__, 2) . '/vendor/autoload.php';

#[\Attribute]
class Security {
    public function __construct(public string $defense, public bool $trace = false) {}
}