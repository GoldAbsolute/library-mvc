<?php

namespace Request;

class Request
{
    public array $request;
    public array $all;

    public function __construct() {
        $this->request = ($_REQUEST);
        $this->all = ($_SERVER);
    }

    /**
     * @param String $key
     * @return mixed
     */
    public function server(String $key = ''): mixed
    {
        return ($_SERVER[strtoupper($key)]);
    }

    /**
     * @return mixed
     */
    public function getUrl(): mixed
    {
        return $this->server('REQUEST_URI');
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return strtoupper($this->server('REQUEST_METHOD'));
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->request;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->all;
    }
}