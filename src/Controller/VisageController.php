<?php

namespace App\Controller;

use App\Repository\VisageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
