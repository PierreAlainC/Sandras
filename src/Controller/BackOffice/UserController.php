<?php

namespace App\Controller\BackOffice;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/user")
 */
class UserController extends AbstractController
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @Route("/unverified", name="app_backoffice_unverified_users")
     */
    public function listUnverifiedUsers(): Response
    {
        $entityManager = $this->doctrine->getManager();
        $unverifiedUsers = $entityManager->getRepository(User::class)->findBy(['isVerified' => false]);
        $unverifiedCount = count($unverifiedUsers); // Compte le nombre d'utilisateurs non vérifiés

        return $this->render('backoffice/user/unverified_users.html.twig', [
            'unverifiedUsers' => $unverifiedUsers,
            'unverifiedCount' => $unverifiedCount, // Passe le compte à la vue
        ]);
    }

    /**
     * @Route("/admin/user/{id}/verify", name="app_verify_user")
     */
    public function verifyUser(User $user): Response
    {
        $entityManager = $this->doctrine->getManager();

            $user->setIsVerified(true); // Met à jour l'état de vérification
            $entityManager->flush();

        // Ajouter un message flash après l'approbation
        $this->addFlash('success', 'L\'utilisateur a été validé avec succès.');
        

        return $this->redirectToRoute('app_backoffice_unverified_users');
    }

    /**
     * @Route("/", name="app_backoffice_user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('backoffice/user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_backoffice_user_new", methods={"GET", "POST"})
     */
    public function new(Request $request, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(User1Type::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->add($user, true);

            return $this->redirectToRoute('app_backoffice_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('backoffice/user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_user_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->add($user, true);

            return $this->redirectToRoute('app_backoffice_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_backoffice_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
