<?php

namespace Router;

use Exception;

class Router {
    public mixed $method;
    public mixed $params;
    public $controller;
    public function __construct($req, $controller) {
        $method = $req->getMethod();
        $this->method = $method;
        $params = $req->getParams();
        $this->params = $params;
        $this->controller = $controller;
    }

    /**
     * @throws Exception
     */
    public function start(): void
    {
        $method = $this->method;
        $params = $this->params;
        switch ($method) {
            case "GET":
                if (count($this->params) > 0) {
                    $this->controller->getOne($params);
                } else {
                    $this->controller->getAll();
                }
                break;
            case "POST":
                    $this->controller->postOne($params);
                break;
            case "PUT":
                $this->controller->updateOne($params);
                break;
            case "DELETE":
                $this->controller->deleteOne($params);
                break;
            default:
                throw new Exception('Метод не поддерживается');
        }
    }
}