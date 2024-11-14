<?php

namespace App\Controller;

use App\Repository\PresentationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OverViewController extends AbstractController
{
    /**
     * Page générale de présentation de Sandra.
     * 
     * @Route("/ConnaîtreSandra", name="overview")
     * 
     * @return Response
     */
    public function overView(PresentationRepository $presentationRepository): Response
    {   
        //Je fait au préalable une injonction dans ma fonction overView pour être lié à PresentationRepository
        //Je récupère toutes les infos de toutes les présentions dans la variable $allPresentation via ma requète findAll() de mon PresentationRepository ($presentationRepository->findAll())
        $allPresentations = $presentationRepository->findAll();

        //dd($allPresentations);

        return $this->render('over_view/overview.html.twig', [
            "allPresentations" => $allPresentations,
        ]);
    }

        /**
     * Page test.
     * 
     * @Route("/ConnaîtreSandratest", name="overviewtest")
     * 
     * @return Response
     */
    public function test(PresentationRepository $presentationRepository): Response
    {   
        //Je fait au préalable une injonction dans ma fonction overView pour être lié à PresentationRepository
        //Je récupère toutes les infos de toutes les présentions dans la variable $allPresentation via ma requète findAll() de mon PresentationRepository ($presentationRepository->findAll())
        $allPresentations = $presentationRepository->findAll();

        //dd($allPresentations);

        return $this->render('over_view/test.html.twig', [
            "allPresentations" => $allPresentations,
        ]);
    }
}
