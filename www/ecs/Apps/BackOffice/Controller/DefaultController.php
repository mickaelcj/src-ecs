<?php

namespace Ecs\Apps\BackOffice\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index(): Response
    {
        return new Response("Hello backOffice");
    }
}
