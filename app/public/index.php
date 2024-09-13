<?php
namespace App\Public;
session_start();
use App\Config\Config;
use App\Core\Router;

use App\Database\Database;
use Fiber;

require_once dirname(__DIR__, 1).'/vendor/autoload.php';

$fiber = new Fiber(function () {
    Fiber::suspend(Database::getInstance(Config::getInstance()));
});

$db = $fiber->start();
$url = $_GET['url'] ?? '/home/index';
Router::route($url, $db);
$fiber->resume();









