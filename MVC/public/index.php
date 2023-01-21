<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\SiteController;
use app\core\Application;


$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');
$app->router->get('/contact', [new SiteController(), 'contact']);
$app->router->post('/contact', [new SiteController(), 'handleContact']);

$app->run();