<?php

use app\controllers\DrawController;
use app\core\Application;

include_once '../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

// $app->router->get('/draw', [DrawController::class]);
$app->router->get('/', [DrawController::class, 'home']);
$app->router->post('/draw', [DrawController::class, 'createDrawing']);
$app->router->get('/draw/{id}', [DrawController::class, 'getDrawingById']);
$app->router->put('/draw/{id}', [DrawController::class, 'updateDrawing']);

$app->run();
