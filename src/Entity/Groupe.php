<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupeRepository::class)
 */
class Groupe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomGroupe;

    /**
     * @ORM\ManyToOne(targetEntity=Activite::class, inversedBy="groupes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $activite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $jour;

    /**
     * @ORM\Column(type="integer")
     */
    private $heureDebut;

    /**
     * @ORM\Column(type="integer")
     */
    private $heureFin;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $adresseNumero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseRue;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $valide;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Membre::class, inversedBy="groupesCrees")
     */
    private $creePar;

    // /**
    //  * @ORM\ManyToMany(targetEntity=Membre::class, inversedBy="groupesInvitations")
    //  */
    // private $invitations;

    /**
     * @ORM\ManyToMany(targetEntity=Membre::class, inversedBy="groupes")
     */
    private $membres;

    /**
     * @ORM\ManyToMany(targetEntity=Membre::class, mappedBy="invitations")
     */
    private $invitations;

    // /**
    //  * @ORM\ManyToMany(targetEntity=Membre::class, inversedBy="invitations")
    //  */
    // private $invitations;

    public function __construct()
    {
        // $this->invitations = new ArrayCollection();
        $this->membres = new ArrayCollection();
        $this->invitations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGroupe(): ?string
    {
        return $this->nomGroupe;
    }

    public function setNomGroupe(?string $nomGroupe): self
    {
        $this->nomGroupe = $nomGroupe;

        return $this;
    }

    public function getActivite(): ?activite
    {
        return $this->activite;
    }

    public function setActivite(?activite $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(?string $jour): self
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

    public function setHeureFin(int $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getAdresseNumero(): ?string
    {
        return $this->adresseNumero;
    }

    public function setAdresseNumero(?string $adresseNumero): self
    {
        $this->adresseNumero = $adresseNumero;

        return $this;
    }

    public function getAdresseRue(): ?string
    {
        return $this->adresseRue;
    }

    public function setAdresseRue(?string $adresseRue): self
    {
        $this->adresseRue = $adresseRue;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreePar(): ?Membre
    {
        return $this->creePar;
    }

    public function setCreePar(?Membre $creePar): self
    {
        $this->creePar = $creePar;

        return $this;
    }

    // /**
    //  * @return Collection|Membre[]
    //  */
    // public function getInvitations(): Collection
    // {
    //     return $this->invitations;
    // }

    // public function addInvitation(Membre $invitation): self
    // {
    //     if (!$this->invitations->contains($invitation)) {
    //         $this->invitations[] = $invitation;
    //     }

    //     return $this;
    // }

    // public function removeInvitation(Membre $invitation): self
    // {
    //     $this->invitations->removeElement($invitation);

    //     return $this;
    // }

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
        }

        return $this;
    }

    public function removeMembre(Membre $membre): self
    {
        $this->membres->removeElement($membre);

        return $this;
    }

    // /**
    //  * @return Collection|Membre[]
    //  */
    // public function getInvitations(): Collection
    // {
    //     return $this->Invitations;
    // }

    // public function addInvitation(Membre $invitation): self
    // {
    //     if (!$this->Invitations->contains($invitation)) {
    //         $this->Invitations[] = $invitation;
    //     }

    //     return $this;
    // }

    // public function removeInvitation(Membre $invitation): self
    // {
    //     $this->Invitations->removeElement($invitation);

    //     return $this;
    // }

    /**
     * @return Collection|Membre[]
     */
    public function getInvitations(): Collection
    {
        return $this->invitations;
    }

    public function addInvitation(Membre $invitation): self
    {
        if (!$this->invitations->contains($invitation)) {
        // if ($this->Invitations != null) {
            // dd('coucou');
            $this->invitations[] = $invitation;
            $invitation->addInvitation($this);
        }

        return $this;
    }

    public function removeInvitation(Membre $invitation): self
    {
        if ($this->invitations->removeElement($invitation)) {
            $invitation->removeInvitation($this);
        }

        return $this;
    }
}
