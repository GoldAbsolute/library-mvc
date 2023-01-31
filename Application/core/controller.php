<?php

class Controller
{
    public mixed $request;

    public mixed $response;

    public function __construct()
    {
        $this->request = $GLOBALS['request'];
        $this->response = $GLOBALS['response'];
    }
}