<?php

namespace FrontOffice\Controller;

use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends AbstractController
{
    /**
     * @Route("/company", name="fo_company")
     */
    public function company()
    {
        return $this->render('front_office/company.html.twig');
    }
}
