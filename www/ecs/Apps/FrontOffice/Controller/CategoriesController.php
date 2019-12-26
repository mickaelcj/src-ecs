<?php

namespace Ecs\Apps\FrontOffice\Controller;

use Symfony\Component\HttpFoundation\Response;

class CategoriesController
{
    public function index(): Response
    {
        return new Response("Hello categories");
    }
}
