<?php
namespace app\services;

use app\datastore\JSONDataStoreService;
use app\datastore\IDataStore;
use app\models\DrawingModel;

class DrawService {
    private IDataStore $dataStore;

    public function __construct(){
        $this->dataStore = new JSONDataStoreService();
    }

    public function findDrawingById(string $drawing_id): ?DrawingModel {
        $drawings = $this->dataStore->read();
        $drawing_by_id_index = array_search($drawing_id, array_column($drawings, 'id'));
        
        if ($drawing_by_id_index !== false ) {
            return $drawings[$drawing_by_id_index];
        }
        return null;
    }

    public function getAllDrawings(): array {
        return $this->dataStore->read();
    }

    public function createDrawing(string $drawing_id) {
        $data = new DrawingModel($drawing_id, null);
        $this->dataStore->save($data);
    }
}