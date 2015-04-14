<?php

namespace AppBundle\RequestHandler\Event;

use Symfony\Component\EventDispatcher\Event;
use AppBundle\RequestHandler\Response;

class ReceivedResponse extends Event
{
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }
}