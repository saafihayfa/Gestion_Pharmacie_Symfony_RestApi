<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VentesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VentesRepository::class)]
#[ApiResource]
class Ventes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $nom_médicament;

    #[ORM\Column(type: 'integer')]
    private $quantité;

    #[ORM\Column(type: 'integer')]
    private $prix;

    #[ORM\ManyToOne(targetEntity: user::class, inversedBy: 'ventes')]
    #[ORM\JoinColumn(nullable: false)]
    private $user_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMédicament(): ?string
    {
        return $this->nom_médicament;
    }

    public function setNomMédicament(string $nom_médicament): self
    {
        $this->nom_médicament = $nom_médicament;

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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

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
}
