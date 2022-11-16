<?php
namespace app\datastore;

use app\models\DrawingModel;

interface IDataStore {
    public function save(DrawingModel $data): void;
    public function read(): array;
    public function remove(string $id): void;
}