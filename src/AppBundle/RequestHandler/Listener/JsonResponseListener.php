<?php

namespace AppBundle\RequestHandler\Listener;

use AppBundle\RequestHandler\Event\ReceivedResponse;

class JsonResponseListener
{

    public function onReceivedResponse(ReceivedResponse $receivedResponse)
    {
        $response = $receivedResponse->getResponse();
        $contentType = $response->getHeader('Content-Type');
        if ( false === strpos($contentType[0], 'application/json') ) {
            return;
        }

        $body = $response->getBody();
        $json = json_decode($body, true);

        if ( json_last_error() ) {
            throw new \Exception("Invalid JSON: $body");
        }

        $response->setBody($json);
    }
}
