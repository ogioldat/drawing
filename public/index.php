<?php

use app\controllers\DrawController;
use app\core\Application;

include_once '../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

// $app->router->get('/draw', [DrawController::class]);
$app->router->get('/', [DrawController::class, 'viewHome']);
$app->router->get('/draw/{id}', [DrawController::class, 'viewDrawingPanel']);
$app->router->post('/api/draw', [DrawController::class, 'createDrawing']);
$app->router->put('/api/draw/{id}', [DrawController::class, 'updateDrawing']);
$app->router->get('/api/draw/{id}', [DrawController::class, 'getDrawingById']);

$app->run();
