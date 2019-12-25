<?php

namespace Ecs\Apps\Cms\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index(): Response
    {
        return new Response("Hello cms");
    }
}
