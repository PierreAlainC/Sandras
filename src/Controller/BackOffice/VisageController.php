<?php

namespace App\Controller\BackOffice;

use App\Entity\Visage;
use App\Form\VisageType;
use App\Repository\VisageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/office/visage")
 */
class VisageController extends AbstractController
{
    /**
     * @Route("/", name="app_back_office_visage_index", methods={"GET"})
     */
    public function index(VisageRepository $visageRepository): Response
    {
        return $this->render('back_office/visage/index.html.twig', [
            'visages' => $visageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_back_office_visage_new", methods={"GET", "POST"})
     */
    public function new(Request $request, VisageRepository $visageRepository): Response
    {
        $visage = new Visage();
        $form = $this->createForm(VisageType::class, $visage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $visageRepository->add($visage, true);

            return $this->redirectToRoute('app_back_office_visage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back_office/visage/new.html.twig', [
            'visage' => $visage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_office_visage_show", methods={"GET"})
     */
    public function show(Visage $visage): Response
    {
        return $this->render('back_office/visage/show.html.twig', [
            'visage' => $visage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_office_visage_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Visage $visage, VisageRepository $visageRepository): Response
    {
        $form = $this->createForm(VisageType::class, $visage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $visageRepository->add($visage, true);

            return $this->redirectToRoute('app_back_office_visage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back_office/visage/edit.html.twig', [
            'visage' => $visage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_office_visage_delete", methods={"POST"})
     */
    public function delete(Request $request, Visage $visage, VisageRepository $visageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$visage->getId(), $request->request->get('_token'))) {
            $visageRepository->remove($visage, true);
        }

        return $this->redirectToRoute('app_back_office_visage_index', [], Response::HTTP_SEE_OTHER);
    }
}
