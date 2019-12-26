<?php

namespace Ecs\Apps\FrontOffice\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Controller Front office homepage
 *
 * @author Roux loic <loic.roux.404@gmail.com>
 */
class DefaultController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('base.html.twig', [
            'message' => "Hello front office"
        ]);
    }
}
