<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=MembreRepository::class)
 */
class Membre implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    private $role;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genre;

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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $distancekm;

    /**
     * @ORM\OneToMany(targetEntity=Moment::class, mappedBy="id_membre", orphanRemoval=true)
     */
    private $moments;

    /**
     * @ORM\ManyToMany(targetEntity=Badge::class, mappedBy="membre")
     */
    private $badges;

    /**
     * @ORM\ManyToMany(targetEntity=Activite::class, inversedBy="membres")
     */
    private $activites;

    /**
     * @ORM\OneToMany(targetEntity=Groupe::class, mappedBy="creePar")
     */
    private $groupesCrees;

    // /**
    //  * @ORM\ManyToMany(targetEntity=Groupe::class, mappedBy="invitations")
    //  */
    // private $groupesInvitations;

    /**
     * @ORM\ManyToMany(targetEntity=Groupe::class, mappedBy="membres")
     */
    private $groupes;

    /**
     * @ORM\ManyToMany(targetEntity=Groupe::class, inversedBy="invitations")
     */
    private $invitations;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $info;

    /**
     * @ORM\OneToMany(targetEntity=Pote::class, mappedBy="Membre", orphanRemoval=true)
     */
    // lien à la table pote :
    //  - accepte == 0 : lorsqu'un groupe est passé, "poteDemandes" c'est la liste des membres avec qui j'étais en groupe, et la question : "Souhaitez-vous rester en contact avec cette personne en lui envoyant vos coordonnées ?" -> si je réponds oui "accepte" passe à 1, sinon mon "poteDemandes" disparait
    //  - accepte == 1 : j'ai donné mes coordonnées à qqn, rien d'autre ne se passe de mon coté
    private $poteDemandes;

    /**
     * @ORM\OneToMany(targetEntity=Pote::class, mappedBy="Pote", orphanRemoval=true)
     */
     // lien à la table pote :
    //  - accepte == 0 : rien ne se passe de mon coté
    //  - accepte == 1 : un membre me considère comme son.sa pote et ses coordonnées s'affichent dans ma liste d'ami.es. + une nouvelle ligne est créée dans "pote" avec la même demande mais inversée. Est-ce que je veux envoyer mes coordonnées à cette personne ? 
    private $potes;

    // /**
    //  * @ORM\ManyToMany(targetEntity=Membre::class, inversedBy="potesDemandes")
    //  */
    // private $potes;

    // /**
    //  * @ORM\ManyToMany(targetEntity=Membre::class, mappedBy="potes")
    //  */
    // private $potesDemandes;


    // /**
    //  * @ORM\ManyToMany(targetEntity=Groupe::class, mappedBy="Invitations")
    //  */
    // private $invitations;

    // /**
    //  * @ORM\OneToMany(targetEntity=MembreActivite::class, mappedBy="membres", orphanRemoval=true)
    //  */
    // private $membreActivites;

    public function __construct()
    {
        // $this->membreActivites = new ArrayCollection();
        $this->activites = new ArrayCollection();
        $this->groupesCrees = new ArrayCollection();
        // $this->groupesInvitations = new ArrayCollection();
        $this->groupes = new ArrayCollection();
        // $this->invitations = new ArrayCollection();
        // $this->potes = new ArrayCollection();
        // $this->potesDemandes = new ArrayCollection();
        $this->poteDemandes = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        // $roles[] = 'ROLE_SUPER_USER';
        // $roles[] = 'ROLE_ADMIN';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

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

    public function getDistancekm(): ?int
    {
        return $this->distancekm;
    }

    public function setDistancekm(?int $distancekm): self
    {
        $this->distancekm = $distancekm;

        return $this;
    }

    /**
     * @return Collection|Moment[]
     */
    public function getMoments(): Collection
    {
        return $this->moments;
    }

    public function addMoment(Moment $moment): self
    {
        if (!$this->moments->contains($moment)) {
            $this->moments[] = $moment;
            $moment->setIdMembre($this);
        }

        return $this;
    }

    public function removeMoment(Moment $moment): self
    {
        if ($this->moments->removeElement($moment)) {
            // set the owning side to null (unless already changed)
            if ($moment->getIdMembre() === $this) {
                $moment->setIdMembre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Badge[]
     */
    public function getBadges(): Collection
    {
        return $this->badges;
    }

    public function addBadge(Badge $badge): self
    {
        if (!$this->badges->contains($badge)) {
            $this->badges[] = $badge;
            $badge->addMembre($this);
        }

        return $this;
    }

    public function removeBadge(Badge $badge): self
    {
        if ($this->badges->removeElement($badge)) {
            $badge->removeMembre($this);
        }

        return $this;
    }
    

    /**
     * @return Collection|Activite[]
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function addActivite(Activite $activite): self
    {
        if (!$this->activites->contains($activite)) {
            $this->activites[] = $activite;
        }

        return $this;
    }

    public function removeActivite(Activite $activite): self
    {
        $this->activites->removeElement($activite);

        return $this;
    }


    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection|Groupe[]
     */
    public function getGroupesCrees(): Collection
    {
        return $this->groupesCrees;
    }

    public function addGroupesCree(Groupe $groupesCree): self
    {
        if (!$this->groupesCrees->contains($groupesCree)) {
            $this->groupesCrees[] = $groupesCree;
            $groupesCree->setCreePar($this);
        }

        return $this;
    }

    public function removeGroupesCree(Groupe $groupesCree): self
    {
        if ($this->groupesCrees->removeElement($groupesCree)) {
            // set the owning side to null (unless already changed)
            if ($groupesCree->getCreePar() === $this) {
                $groupesCree->setCreePar(null);
            }
        }

        return $this;
    }

    // /**
    //  * @return Collection|Groupe[]
    //  */
    // public function getGroupesInvitations(): Collection
    // {
    //     return $this->groupesInvitations;
    // }

    // public function addGroupesInvitation(Groupe $groupesInvitation): self
    // {
    //     if (!$this->groupesInvitations->contains($groupesInvitation)) {
    //         $this->groupesInvitations[] = $groupesInvitation;
    //         $groupesInvitation->addInvitation($this);
    //     }

    //     return $this;
    // }

    // public function removeGroupesInvitation(Groupe $groupesInvitation): self
    // {
    //     if ($this->groupesInvitations->removeElement($groupesInvitation)) {
    //         $groupesInvitation->removeInvitation($this);
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
            $groupe->addMembre($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupes->removeElement($groupe)) {
            $groupe->removeMembre($this);
        }

        return $this;
    }

    // /**
    //  * @return Collection|Groupe[]
    //  */
    // public function getInvitations(): Collection
    // {
    //     return $this->invitations;
    // }

    // public function addInvitation(Groupe $invitation): self
    // {
    //     if (!$this->invitations->contains($invitation)) {
    //         $this->invitations[] = $invitation;
    //         $invitation->addInvitation($this);
    //     }

    //     return $this;
    // }

    // public function removeInvitation(Groupe $invitation): self
    // {
    //     if ($this->invitations->removeElement($invitation)) {
    //         $invitation->removeInvitation($this);
    //     }

    //     return $this;
    // }

    /**
     * @return Collection|Groupe[]
     */
    public function getInvitations(): Collection
    {
        return $this->invitations;
    }

    public function addInvitation(Groupe $invitation): self
    {
        if (!$this->invitations->contains($invitation)) {
            $this->invitations[] = $invitation;
        }

        return $this;
    }

    public function removeInvitation(Groupe $invitation): self
    {
        $this->invitations->removeElement($invitation);

        return $this;
    }

    public function getInfo(): ?bool
    {
        return $this->info;
    }

    public function setInfo(?bool $info): self
    {
        $this->info = $info;

        return $this;
    }

    // /**
    //  * @return Collection|self[]
    //  */
    // public function getPotes(): Collection
    // {
    //     return $this->potes;
    // }

    // public function addPote(self $pote): self
    // {
    //     if (!$this->potes->contains($pote)) {
    //         $this->potes[] = $pote;
    //     }

    //     return $this;
    // }

    // public function removePote(self $pote): self
    // {
    //     $this->potes->removeElement($pote);

    //     return $this;
    // }

    // /**
    //  * @return Collection|self[]
    //  */
    // public function getPotesDemandes(): Collection
    // {
    //     return $this->potesDemandes;
    // }

    // public function addPotesDemande(self $potesDemande): self
    // {
    //     if (!$this->potesDemandes->contains($potesDemande)) {
    //         $this->potesDemandes[] = $potesDemande;
    //         $potesDemande->addPote($this);
    //     }

    //     return $this;
    // }

    // public function removePotesDemande(self $potesDemande): self
    // {
    //     if ($this->potesDemandes->removeElement($potesDemande)) {
    //         $potesDemande->removePote($this);
    //     }

    //     return $this;
    // }

    /**
     * @return Collection|Pote[]
     */
    public function getPoteDemandes(): Collection
    {
        return $this->poteDemandes;
    }

    public function addPoteDemande(Pote $poteDemande): self
    {
        if (!$this->poteDemandes->contains($poteDemande)) {
            $this->poteDemandes[] = $poteDemande;
            $poteDemande->setMembre($this);
        }

        return $this;
    }

    public function removePoteDemande(Pote $poteDemande): self
    {
        if ($this->poteDemandes->removeElement($poteDemande)) {
            // set the owning side to null (unless already changed)
            if ($poteDemande->getMembre() === $this) {
                $poteDemande->setMembre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pote[]
     */
    public function getPotes(): Collection
    {
        return $this->potes;
    }

    public function addPote(Pote $pote): self
    {
        if (!$this->potes->contains($pote)) {
            $this->potes[] = $pote;
            $pote->setPote($this);
        }

        return $this;
    }

    public function removePote(Pote $pote): self
    {
        if ($this->potes->removeElement($pote)) {
            // set the owning side to null (unless already changed)
            if ($pote->getPote() === $this) {
                $pote->setPote(null);
            }
        }

        return $this;
    }

   
}
