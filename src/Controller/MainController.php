<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * Accès page Licorne.
     * 
     * @Route("/licorne", name="unicorn")
     */
    public function unicorn(): Response
    {
        return $this->render('main/licorn.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * Page d'accueil.
     * 
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * Page générale de présentation de Sandra.
     * 
     * @Route("/ConnaîtreSandra", name="overview")
     */
    public function overView(): Response
    {
        return $this->render('main/overview.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
