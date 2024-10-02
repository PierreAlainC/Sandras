<?php

namespace App\Controller\BackOffice;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @Route("/backoffice", name="backoffice_main")
     */
    public function index(): Response
    {
        $entityManager = $this->doctrine->getManager();
    
        // Compter les utilisateurs non vérifiés
        $unverifiedUsers = $entityManager->getRepository(User::class)->findBy(['isVerified' => false]);
        $unverifiedCount = count($unverifiedUsers); // Compte le nombre d'utilisateurs non vérifiés
    
        return $this->render('backoffice/main/index.html.twig',[
        'unverifiedCount' => $unverifiedCount, // Passe le compte à la vue
        ]);
    }

}
