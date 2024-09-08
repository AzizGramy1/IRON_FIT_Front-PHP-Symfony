<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ForumRepository;


/**
 * @ORM\Entity
 * @ORM\Table(name="forum")
 */
#[ORM\Entity]
#[ORM\Table(name: "forum")]
class Forum
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "bigint")]
    private $idForum;

    #[ORM\Column(type: "string", length: 255)]
    private $dateCreationForum;

    #[ORM\Column(type: "bigint")]
    private $idSujetForum;

    #[ORM\Column(type: "bigint")]
    private $idUserAdmin;

    #[ORM\Column(type: "text", nullable: true)]
    private $listeParticipants;

    // Getters and Setters

    public function getIdForum(): ?int
    {
        return $this->idForum;
    }

    public function setIdForum(?int $idForum): self
    {
        $this->idForum = $idForum;
        return $this;
    }

    public function getDateCreationForum(): ?string
    {
        return $this->dateCreationForum;
    }

    public function setDateCreationForum(string $dateCreationForum): self
    {
        $this->dateCreationForum = $dateCreationForum;
        return $this;
    }

    public function getIdSujetForum(): ?string
    {
        return $this->idSujetForum;
    }

    public function setIdSujetForum(string $idSujetForum): self
    {
        $this->idSujetForum = $idSujetForum;
        return $this;
    }

    public function getIdUserAdmin(): ?string
    {
        return $this->idUserAdmin;
    }

    public function setIdUserAdmin(string $idUserAdmin): self
    {
        $this->idUserAdmin = $idUserAdmin;
        return $this;
    }

    public function getListeParticipants(): ?string
    {
        return $this->listeParticipants;
    }

    public function setListeParticipants(?string $listeParticipants): self
    {
        $this->listeParticipants = $listeParticipants;
        return $this;
    }


    // __toString() method
    public function __toString(): string
    {
        return sprintf(
            'Forum ID: %d, Created on: %s',
            $this->getIdForum(),
            $this->getDateCreationForum() ?? 'N/A'
        );
    }
}
