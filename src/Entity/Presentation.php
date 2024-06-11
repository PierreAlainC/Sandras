<?php

namespace App\Entity;

use App\Repository\PresentationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PresentationRepository::class)
 */
class Presentation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="string", length=510)
     */
    private $SousTitre;

    /**
     * @ORM\Column(type="string", length=2550)
     */
    private $Resume;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Logo;

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

    public function getSousTitre(): ?string
    {
        return $this->SousTitre;
    }

    public function setSousTitre(string $SousTitre): self
    {
        $this->SousTitre = $SousTitre;

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

    public function getLogo(): ?string
    {
        return $this->Logo;
    }

    public function setLogo(string $Logo): self
    {
        $this->Logo = $Logo;

        return $this;
    }
}
