<?php

namespace FrontOffice\Controller;

use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="fo_homepage")
     */
    public function homepage()
    {
        return $this->render('front_office/homepage.html.twig');
    }
}
