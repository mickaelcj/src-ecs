<?php

namespace Ecs\Apps\FrontOffice\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index(): Response
    {
        return new Response("Hello front_office");
    }
}
