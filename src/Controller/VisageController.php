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
        $allVisages = $visageRepository->findAll();

        //dd($allVisages);

        return $this->render('visage/visage.html.twig', [
            'controller_name' => 'VisageController',
        ]);
    }
}
