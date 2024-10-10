<?php

namespace App\Controller\BackOffice;

use App\Entity\User;
use App\Entity\Visage;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private ManagerRegistry $doctrine;
    private $entityManager;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->entityManager = $doctrine->getManager();
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
    
        // Compter les visages non approuvés
        $unapprovedVisage = $entityManager->getRepository(Visage::class)->findBy(['isApproved' => false]);
        $unapprovedCount = count($unapprovedVisage); // Compte le nombre de visages non approuvés
        
        return $this->render('backoffice/main/index.html.twig',[
        'unverifiedCount' => $unverifiedCount, // Passe le compte des utilisateurs non vérifiés à la vue
        'unapprovedCount' => $unapprovedCount, // Passe le compte des visages à approuver à la vue           
        ]);
    }
}