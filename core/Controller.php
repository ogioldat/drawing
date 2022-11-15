<?php
namespace app\core;

class Controller
{
    public string $layout = 'main';
    public string $action = '';

    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }

    public function render($view, $params = []): string
    {
        return Application::$app->router->renderView($view, $params);
    }
}