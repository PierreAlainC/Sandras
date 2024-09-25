<?php

namespace App\Entity;

use App\Repository\VisageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VisageRepository::class)
 */
class Visage
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
    private $Resume;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomLien;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;


    public function getId(): ?int
    {
        return $this->id;
    }

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

    public function getResume(): ?string
    {
        return $this->Resume;
    }

    public function setResume(string $Resume): self
    {
        $this->Resume = $Resume;

        return $this;
    }

    public function getNomLien(): ?string
    {
        return $this->nomLien;
    }

    public function setNomLien(string $nomLien): self
    {
        $this->nomLien = $nomLien;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

}
