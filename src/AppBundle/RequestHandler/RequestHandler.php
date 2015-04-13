<?php

namespace AppBundle\RequestHandler;

use Symfony\Component\HttpFoundation\Request;

interface RequestHandler
{
    public function handle(Request $request);
}