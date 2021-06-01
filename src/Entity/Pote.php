<?php

namespace App\Entity;

use App\Repository\PoteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PoteRepository::class)
 */
class Pote
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Membre::class, inversedBy="poteDemandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $membre;

    /**
     * @ORM\ManyToOne(targetEntity=Membre::class, inversedBy="potes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pote;

    /**
     * @ORM\Column(type="boolean")
     */
    private $accepte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMembre(): ?Membre
    {
        return $this->membre;
    }

    public function setMembre(?Membre $membre): self
    {
        $this->membre = $membre;

        return $this;
    }

    public function getPote(): ?Membre
    {
        return $this->pote;
    }

    public function setPote(?Membre $pote): self
    {
        $this->pote = $pote;

        return $this;
    }

    public function getAccepte(): ?bool
    {
        return $this->accepte;
    }

    public function setAccepte(bool $accepte): self
    {
        $this->accepte = $accepte;

        return $this;
    }
}
