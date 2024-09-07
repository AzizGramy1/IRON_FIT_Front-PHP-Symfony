<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SujetForumRepository;

/**
 * @ORM\Entity
 * @ORM\Table(name="sujets_forum")
 */
#[ORM\Entity]
#[ORM\Table(name: "sujets_forum")]
class SujetsForum
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "bigint")]
    private $idSujetForum;

    #[ORM\Column(type: "date")]
    private $dateCreations;

    #[ORM\Column(type: "string", length: 255)]
    private $sujet;

    #[ORM\Column(type: "string", length: 255)]
    private $theme;

    #[ORM\Column(type: "text", nullable: true)]
    private $descriptifSujet;

    // Getters and Setters

    public function getIdSujetForum(): ?string
    {
        return $this->idSujetForum;
    }

    public function setIdSujetForum(?string $idSujetForum): self
    {
        $this->idSujetForum = $idSujetForum;
        return $this;
    }

    public function getDateCreations(): ?\DateTimeInterface
    {
        return $this->dateCreations;
    }

    public function setDateCreations(\DateTimeInterface $dateCreations): self
    {
        $this->dateCreations = $dateCreations;
        return $this;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;
        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;
        return $this;
    }

    public function getDescriptifSujet(): ?string
    {
        return $this->descriptifSujet;
    }

    public function setDescriptifSujet(?string $descriptifSujet): self
    {
        $this->descriptifSujet = $descriptifSujet;
        return $this;
    }
}
