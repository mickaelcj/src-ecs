<?php

namespace FrontOffice\Controller;

use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="fo_homepage")
     */
    public function index()
    {
        return $this->render('front_office/index.html.twig');
    }
}
