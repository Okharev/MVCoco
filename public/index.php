<?php

use controllers\ContactController;
use core\Application;

require_once '../autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', [ContactController::class, 'index']);
$app->router->get('/contact', [ContactController::class, 'contact']);

$app->router->post('/contact', [ContactController::class, 'handleContact'] );

$app->run();