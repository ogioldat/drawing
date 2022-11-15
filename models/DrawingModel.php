<?php
namespace app\models;

class DrawingModel {
    public string $id;
    public ?string $base64Canvas;

    public function __construct(string $id, ?string $base64Canvas) {
        $this->id = $id;
        $this->base64Canvas = $base64Canvas;
    }
}