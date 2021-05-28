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

    // /**
    //  * @ORM\OneToMany(targetEntity=MembreActivite::class, mappedBy="activites", orphanRemoval=true)
    //  */
    // private $membreActivites;

    /**
     * @ORM\OneToMany(targetEntity=Groupe::class, mappedBy="activite")
     */
    private $groupes;

    /**
     * @ORM\ManyToMany(targetEntity=Membre::class, mappedBy="activites")
     */
    private $membres;

    public function __construct()
    {
        // $this->membreActivites = new ArrayCollection();
        $this->groupes = new ArrayCollection();
        $this->membres = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nomActivite;
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

    // /**
    //  * @return Collection|MembreActivite[]
    //  */
    // public function getMembreActivites(): Collection
    // {
    //     return $this->membreActivites;
    // }

    // public function addMembreActivite(MembreActivite $membreActivite): self
    // {
    //     if (!$this->membreActivites->contains($membreActivite)) {
    //         $this->membreActivites[] = $membreActivite;
    //         $membreActivite->setActivites($this);
    //     }

    //     return $this;
    // }

    // public function removeMembreActivite(MembreActivite $membreActivite): self
    // {
    //     if ($this->membreActivites->removeElement($membreActivite)) {
    //         // set the owning side to null (unless already changed)
    //         if ($membreActivite->getActivites() === $this) {
    //             $membreActivite->setActivites(null);
    //         }
    //     }

    //     return $this;
    // }

    /**
     * @return Collection|Groupe[]
     */
    public function getGroupes(): Collection
    {
        return $this->groupes;
    }

    public function addGroupe(Groupe $groupe): self
    {
        if (!$this->groupes->contains($groupe)) {
            $this->groupes[] = $groupe;
            $groupe->setActivite($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupes->removeElement($groupe)) {
            // set the owning side to null (unless already changed)
            if ($groupe->getActivite() === $this) {
                $groupe->setActivite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Membre[]
     */
    public function getMembres(): Collection
    {
        return $this->membres;
    }

    public function addMembre(Membre $membre): self
    {
        if (!$this->membres->contains($membre)) {
            $this->membres[] = $membre;
            $membre->addActivite($this);
        }

        return $this;
    }

    public function removeMembre(Membre $membre): self
    {
        if ($this->membres->removeElement($membre)) {
            $membre->removeActivite($this);
        }

        return $this;
    }

    
}
