<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\DrawingModel;
use app\services\DrawService;
use Exception;

class DrawController extends Controller {
    private DrawService $drawService;

    public function __construct() {
        $this->drawService = new DrawService();
    }

    public function viewHome() {
        $drawings = $this->drawService->getAllDrawings();
        return $this->render('index', ['data' => $drawings]);
    }

    public function viewDrawingPanel(Request $request) {
        $drawing_id = $request->getRouteParam('id');
        $drawing = $this->drawService->findDrawingById($drawing_id);

        if ($drawing === null) {
            throw new Exception('Not found', 404);
        }

        return $this->render('draw', ['data' => $drawing]);
    }
    
    public function createDrawing(Request $request, Response $response) {
        $drawing_id = uniqid();
        $path = "/draw/" . $drawing_id;

        $this->drawService->createDrawing($drawing_id);

        return $response->redirect($path);
    }

    public function updateDrawing(Request $request, Response $response) {
        $drawing_id = $request->getRouteParam('id');
        $body = $request->getBody();
        $canvas = $body["base64Canvas"];

        if ($drawing_id == "" ) {
            throw new Exception('Bad request', 400);
        }

        $currentDrawing = $this->drawService->findDrawingById($drawing_id);
        if ($currentDrawing === false) {
            throw new Exception('Not found', 404);
        }
        $data = new DrawingModel($drawing_id, $canvas);

        $this->drawService->updateDrawing($data);
    }

    public function getDrawingById(Request $request) {
        $drawing_id = $request->getRouteParam('id');
        $drawing = $this->drawService->findDrawingById($drawing_id);

        if ($drawing === null) {
            throw new Exception('Not found', 404);
        }

        header("Content-Type: application/json");

        return json_encode($drawing);
    }
}