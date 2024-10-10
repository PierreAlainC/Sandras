<?php

namespace App\Controller\BackOffice;

use App\Entity\Visage;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\VisageType;
use App\Repository\VisageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/visage")
 */
class VisageController extends AbstractController
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

        /**
     * @Route("/unapproved", name="app_backoffice_unapproved_visages")
     */
    public function listUnapprovedVisages(): Response
    {
        $entityManager = $this->doctrine->getManager();
        $unapprovedVisage = $entityManager->getRepository(Visage::class)->findBy(['isApproved' => false]);
        $unapprovedCount = count($unapprovedVisage); // Compte le nombre de visages non approuvés
    
        return $this->render('backoffice/visage/unapproved_visage.html.twig', [
            'unapprovedVisage' => $unapprovedVisage,
            'unapprovedCount' => $unapprovedCount, // Passe le compte des visages à approuver à la vue
        ]);
    }
    

    /**
     * @Route("/admin/visage/{id}/approve", name="app_approve_visage")
     */
    public function approveVisage(Visage $visage): Response
    {
        $entityManager = $this->doctrine->getManager();

            $visage->setIsApproved(true); // Met à jour l'état de l'approbation du visage
            $entityManager->flush();

        // Ajouter un message flash après l'approbation
        $this->addFlash('success', 'Le visage a été approuvé avec succès.');
        
        return $this->redirectToRoute('app_backoffice_unapproved_visages')
        ;
    }

    /**
     * @Route("/", name="app_backoffice_visage_index", methods={"GET"})
     */
    public function index(VisageRepository $visageRepository): Response
    {
        $visages = $visageRepository->findAll();

        return $this->render('backoffice/visage/index.html.twig', [
            'visages' => $visages,
        ]);
    }

    /**
     * @Route("/new", name="app_backoffice_visage_new", methods={"GET", "POST"})
     */
    public function new(Request $request, VisageRepository $visageRepository): Response
    {
        $visage = new Visage();
        $form = $this->createForm(VisageType::class, $visage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $visageRepository->add($visage, true);

            return $this->redirectToRoute('app_backoffice_visage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/visage/new.html.twig', [
            'visage' => $visage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_visage_show", methods={"GET"})
     */
    public function show(Visage $visage): Response
    {
        return $this->render('backoffice/visage/show.html.twig', [
            'visage' => $visage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_visage_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Visage $visage, VisageRepository $visageRepository): Response
    {
        $form = $this->createForm(VisageType::class, $visage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $visageRepository->add($visage, true);

            return $this->redirectToRoute('app_backoffice_visage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/visage/edit.html.twig', [
            'visage' => $visage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_visage_delete", methods={"POST"})
     */
    public function delete(Request $request, Visage $visage, VisageRepository $visageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$visage->getId(), $request->request->get('_token'))) {
            $visageRepository->remove($visage, true);
        }

        return $this->redirectToRoute('app_backoffice_visage_index', [], Response::HTTP_SEE_OTHER);
    }

}
