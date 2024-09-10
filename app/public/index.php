<?php
require_once __DIR__ . '/../src/config/config.php';
require_once __DIR__ . '/../src/core/Router.php';
require_once __DIR__ . '/../src/database/Database.php';

$db = Database::getInstance();

$url = isset($_GET['url']) ? $_GET['url'] : 'home/index';
Router::route($url, $db);

?>

