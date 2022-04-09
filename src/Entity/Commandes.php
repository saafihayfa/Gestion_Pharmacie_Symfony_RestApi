<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommandesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandesRepository::class)]
#[ApiResource]
class Commandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $libellé;

    #[ORM\Column(type: 'integer')]
    private $quantité;

    #[ORM\Column(type: 'date')]
    private $date_commande;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'commandes')]
    private $user_id;

    #[ORM\ManyToMany(targetEntity: Fournisseurs::class, inversedBy: 'commandes')]
    private $fournisseur_id;

    public function __construct()
    {
        $this->fournisseur_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLibellé(): ?string
    {
        return $this->libellé;
    }

    public function setLibellé(string $libellé): self
    {
        $this->libellé = $libellé;

        return $this;
    }

    public function getQuantité(): ?int
    {
        return $this->quantité;
    }

    public function setQuantité(int $quantité): self
    {
        $this->quantité = $quantité;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->date_commande;
    }

    public function setDateCommande(\DateTimeInterface $date_commande): self
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    public function getUserId(): ?user
    {
        return $this->user_id;
    }

    public function setUserId(?user $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return Collection<int, fournisseurs>
     */
    public function getFournisseurId(): Collection
    {
        return $this->fournisseur_id;
    }

    public function addFournisseurId(fournisseurs $fournisseurId): self
    {
        if (!$this->fournisseur_id->contains($fournisseurId)) {
            $this->fournisseur_id[] = $fournisseurId;
        }

        return $this;
    }

    public function removeFournisseurId(fournisseurs $fournisseurId): self
    {
        $this->fournisseur_id->removeElement($fournisseurId);

        return $this;
    }
}
