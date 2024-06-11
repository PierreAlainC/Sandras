<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OverViewController extends AbstractController
{
    /**
     * Page générale de présentation de Sandra.
     * 
     * @Route("/ConnaîtreSandra", name="overview")
     */
    public function overView(): Response
    {
        return $this->render('over_view/overview.html.twig', [
            'controller_name' => 'OverViewController',
        ]);
    }
}
