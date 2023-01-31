<?php

namespace Controllers;

require 'Application/models/Library_model.php';
require 'Application/core/controller.php';
use Controller;
use Models\library_model;

class library_controller extends Controller
{

    private library_model $model;
    private $params;

    /**
     * @param $params
     */
    function __construct($params)
    {
        $this->model = new library_model();
        $this->params = $params;
    }

    public function getAll() {
            $model = $this->model;
            $books = $model->getAllBooks();
            http_response_code(200);
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Credentials: true');
        header('Content-type: Application/json; charset=utf-8');
            echo $books;
    }

    public function getOne() {
        $model = $this->model;
        $books = $model->getOneBook($this->params);
        http_response_code(200);
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Credentials: true');
        header('Content-type: Application/json; charset=utf-8');
        echo $books;
    }

    public function postOne() {
        $model = $this->model;
        $books = $model->addOneBook($this->params);
        http_response_code(200);
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Credentials: true');
        header('Content-type: Application/json; charset=utf-8');
        echo $books;
    }

    public function updateOne() {
        $model = $this->model;
        $books = $model->updateBook($this->params);
        http_response_code(200);
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Credentials: true');
        header('Content-type: Application/json; charset=utf-8');
        echo $books;
    }

    public function deleteOne() {
        $model = $this->model;
        $books = $model->deleteBook($this->params['id']);
        http_response_code(200);
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Credentials: true');
        header('Content-type: Application/json; charset=utf-8');
        echo $books;
    }
}