<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActiviteRepository::class)
 */
class Activite
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
    private $nomActivite;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $valide;

    /**
     * @ORM\ManyToOne(targetEntity=ActiviteCategorie::class, inversedBy="activites")
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity=membre::class, inversedBy="activites")
     */
    private $Membres;

    public function __construct()
    {
        $this->Membres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomActivite(): ?string
    {
        return $this->nomActivite;
    }

    public function setNomActivite(string $nomActivite): self
    {
        $this->nomActivite = $nomActivite;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getValide(): ?bool
    {
        return $this->valide;
    }

    public function setValide(?bool $valide): self
    {
        $this->valide = $valide;

        return $this;
    }

    public function getCategorie(): ?ActiviteCategorie
    {
        return $this->categorie;
    }

    public function setCategorie(?ActiviteCategorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|membre[]
     */
    public function getMembres(): Collection
    {
        return $this->Membres;
    }

    public function addMembre(membre $membre): self
    {
        if (!$this->Membres->contains($membre)) {
            $this->Membres[] = $membre;
        }

        return $this;
    }

    public function removeMembre(membre $membre): self
    {
        $this->Membres->removeElement($membre);

        return $this;
    }
}
