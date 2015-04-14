<?php

namespace AppBundle\RequestHandler;

use AppBundle\RequestHandler\Request;

interface RequestHandler
{
    public function handle(Request $request);
}