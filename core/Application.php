<?php

namespace app\core;

class Application {
    // const EVENT_BEFORE_REQUEST = 'beforeRequest';
    // const EVENT_AFTER_REQUEST = 'afterRequest';

    protected array $eventListeners = [];

    public static Application $app;
    public static string $ROOT_DIR;
    public string $userClass;
    public string $layout = 'main';
    public Router $router;
    public Request $request;
    public Response $response;
    public ?Controller $controller = null;
    public View $view;

    public function __construct($rootDir)
    {
        self::$ROOT_DIR = $rootDir;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
    }

    public function run()
    {
        // $this->triggerEvent(self::EVENT_BEFORE_REQUEST);
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            echo $this->router->renderView('_error', [
                'exception' => $e,
            ]);
        }
    }

    // public function triggerEvent($eventName)
    // {
    //     $callbacks = $this->eventListeners[$eventName] ?? [];
    //     foreach ($callbacks as $callback) {
    //         call_user_func($callback);
    //     }
    // }

    // public function on($eventName, $callback)
    // {
    //     $this->eventListeners[$eventName][] = $callback;
    // }
}
