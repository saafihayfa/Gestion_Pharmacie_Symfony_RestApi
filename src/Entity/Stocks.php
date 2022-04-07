<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StocksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StocksRepository::class)]
#[ApiResource]
class Stocks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $nom;

    #[ORM\Column(type: 'integer')]
    private $entrée;

    #[ORM\Column(type: 'integer')]
    private $sortie;

    #[ORM\Column(type: 'string', length: 20)]
    private $etat;

    #[ORM\ManyToOne(targetEntity: user::class, inversedBy: 'stocks')]
    #[ORM\JoinColumn(nullable: false)]
    private $user_id;

    #[ORM\OneToMany(mappedBy: 'stocks', targetEntity: medicaments::class)]
    private $médicament_id;

    public function __construct()
    {
        $this->médicament_id = new ArrayCollection();
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

    public function getEntrée(): ?int
    {
        return $this->entrée;
    }

    public function setEntrée(int $entrée): self
    {
        $this->entrée = $entrée;

        return $this;
    }

    public function getSortie(): ?int
    {
        return $this->sortie;
    }

    public function setSortie(int $sortie): self
    {
        $this->sortie = $sortie;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

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
     * @return Collection<int, medicaments>
     */
    public function getMédicamentId(): Collection
    {
        return $this->médicament_id;
    }

    public function addMDicamentId(medicaments $mDicamentId): self
    {
        if (!$this->médicament_id->contains($mDicamentId)) {
            $this->médicament_id[] = $mDicamentId;
            $mDicamentId->setStocks($this);
        }

        return $this;
    }

    public function removeMDicamentId(medicaments $mDicamentId): self
    {
        if ($this->médicament_id->removeElement($mDicamentId)) {
            // set the owning side to null (unless already changed)
            if ($mDicamentId->getStocks() === $this) {
                $mDicamentId->setStocks(null);
            }
        }

        return $this;
    }
}
