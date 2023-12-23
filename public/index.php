<?php
require_once __DIR__."/../vendor/autoload.php";

use app\controllers\SiteController;
use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');
$app->router->get('/user', 'user');
$app->router->post('/user', [SiteController::class, 'handleUser']);

$app->run();