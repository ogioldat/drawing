<?php
namespace app\datastore;

use app\models\DrawingModel;

class JSONDataStoreService implements IDataStore {
    private $DATA_FILE = '../data/drawings.json';
    public function read(): array {
        $drawings = [];

        try {
            $fileContent = file_get_contents($this->DATA_FILE);
            $jsonArray = json_decode($fileContent);
            
            foreach($jsonArray as $index => $obj) {
                array_push(
                    $drawings,
                    new DrawingModel(
                        $obj->id,
                        $obj->base64Canvas
                    )
                );
            }
        } catch(\Exception $e) {
            echo "Error when processing file";
            echo $e;
        }
    
        return $drawings;
    }

    public function save(DrawingModel $data): void {
        $drawings = $this->read();
        array_push(
            $drawings,
            $data
        );
        $json = json_encode($drawings);

        if (file_put_contents($this->DATA_FILE, $json)) {
            return;
        } 
        echo "Oops! Error creating json file...";
    }

    public function remove(string $id): void {
        $drawings = $this->read();
        file_put_contents($this->DATA_FILE, json_encode([]));

        $drawingsWithoutRemoved = [];

        foreach ($drawings as $index => $storedDrawing) {
            if ($storedDrawing->id !== $id) {
                array_push($drawingsWithoutRemoved, $storedDrawing);
            }
        }
        $json = json_encode($drawingsWithoutRemoved);
        file_put_contents($this->DATA_FILE, $json);
    }
}