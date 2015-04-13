<?php

namespace AppBundle\RequestHandler;

class Response
{
    private $statusCode;

    private $headers = array();

    public function __construct($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function getStatusCode()
    {
       return $this->statusCode;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    public function getHeader($name)
    {
        return (isset($this->headers[$name]) ? $this->headers[$name] : null);
    }
}
