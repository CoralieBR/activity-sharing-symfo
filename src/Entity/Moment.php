<?php

namespace App\Entity;

use App\Repository\MomentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MomentRepository::class)
 */
class Moment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=membre::class, inversedBy="moments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_membre;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $jour;

    /**
     * @ORM\Column(type="integer")
     */
    private $heureDebut;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $heureFin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMembre(): ?membre
    {
        return $this->id_membre;
    }

    public function setIdMembre(?membre $id_membre): self
    {
        $this->id_membre = $id_membre;

        return $this;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getHeureDebut(): ?int
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(int $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?int
    {
        return $this->heureFin;
    }

    public function setHeureFin(?int $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }
}
