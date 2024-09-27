<?php

namespace App\Security\Voter;

use App\Entity\Movie;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class QuatorzeHeureVoter extends Voter
{
    public const EDIT = 'MOVIE_EDIT';
    public const VIEW = 'MOVIE_VIEW';

    /**
     * Est ce que je suis capable de gérer ce droit sur ce sujet
     *
     * @param string $attribute le ROLE/Droit
     * @param mixed $subject l'objet que l'on traite
     * @return boolean
     */
    protected function supports(string $attribute, $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        //? on regarde si on connait le droit demandé
        $isRoleKnown = in_array($attribute, ['MOVIE_EDIT_14H']);
        // dump($isRoleKnown);
        //? est ce que je reconnait le sujet sur lequel on va travailler
        $isSubjectKnown = $subject instanceof Movie;
        // dump($isSubjectKnown);
        return $isRoleKnown && $isSubjectKnown;
    }

    /**
     * Ceci est un idée/une démo de ce que peut être le Voter des ROLE dans Symfony
     */
    protected function supportsRoleExemple(string $attribute, $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        //? on regarde si on connait le droit demandé
        $isRoleKnown = str_starts_with($attribute, 'ROLE_');

        //? est ce que je reconnait le sujet sur lequel on va travailler
        $isSubjectKnown = $subject instanceof User;

        return $isRoleKnown && $isSubjectKnown;
    }

    /**
     * cette méthode est apellé SI et SEULEMENT SI la méthode support a répondu TRUE
     *
     * @param string $attribute le role/droit que l'on teste
     * @param [type] $subject l'objet que l'on manipule
     * @param TokenInterface $token l'utilisateur connecté
     * @return boolean TRUE si tu as le droit, FAlSE sinon
     */
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        // dd('On commence à réfléchir à notre code de droit, savoir si oui ou nons tu as la droit');
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }


        // ... (check conditions and return true to grant permission) ...
        // si il est moins de 14h30, tu as le droit
        if (date('Hi') < 1600){
            return true;
        }

        // dd($subject);
        // on a pas le droit de modifier le Movie ID 4523
        /** @var Movie $subject */
        if ($subject->getId() == 4523){
            return false;
        }

        


        // toujours une valeur par defaut, de préfenrence FALSE
        return false;
    }
}
