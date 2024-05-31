<?php

namespace App\Entity;

use App\Repository\VisagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisagesRepository::class)
 */
class Visages
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Titre;

    /**
     * @ORM\Column(type="text")
     */
    private $Contenu;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private $Résumé;


    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->Contenu;
    }

    public function setContenu(string $Contenu): self
    {
        $this->Contenu = $Contenu;

        return $this;
    }

    public function getRésumé(): ?string
    {
        return $this->Résumé;
    }

    public function setRésumé(string $Résumé): self
    {
        $this->Résumé = $Résumé;

        return $this;
    }

}
