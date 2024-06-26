<?php

namespace App\Controller;

use App\Repository\VisageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Visage;

class VisageController extends AbstractController
{
    /**
     * @Route("/visages", name="visages")
     */
    public function visageSandra(VisageRepository $visageRepository): Response
    {
        //Je fait au préalable une injonction dans ma fonction overView pour être lié à VisageRepository
        //Je récupère toutes les infos de toutes les présentions dans la variable $allPresentation via ma requète findAll() de mon VisageRepository ($visageRepository->findAll())
        $allVisages = $visageRepository->findAll();

        //dd($allVisages);

        return $this->render('visage/visage.html.twig', [
            'allVisages' => $allVisages,
        ]);
    }

    /**
     * @Route("/visages/visage/{id<\d+>}", name="Visage")
     */
    public function show(Visage $visage): Response
    {        
        if (!$visage){
            throw $this->createNotFoundException("Aucun visage correspondant");
        }

        return $this->render('visage/show.html.twig', [
            'visage' => $visage,
        ]);

    }
}
