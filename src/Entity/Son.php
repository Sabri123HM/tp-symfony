<?php

namespace App\Entity;

use App\Repository\SonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SonRepository::class)
 */
class Son
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
    private $nomSon;

    /**
     * @ORM\Column(type="integer")
     */
    private $longueurSon;

    /**
     * @ORM\ManyToMany(targetEntity=Artiste::class, inversedBy="sons")
     */
    private $artiste;

    public function __construct()
    {
        $this->artiste = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSon(): ?string
    {
        return $this->nomSon;
    }

    public function setNomSon(string $nomSon): self
    {
        $this->nomSon = $nomSon;

        return $this;
    }

    public function getLongueurSon(): ?int
    {
        return $this->longueurSon;
    }

    public function setLongueurSon(int $longueurSon): self
    {
        $this->longueurSon = $longueurSon;

        return $this;
    }
    
    /**
     * @return Collection|Artiste[]
     */
    public function getArtiste(): Collection
    {
        return $this->artiste;
    }

    public function addArtiste(Artiste $artiste): self
    {
        if (!$this->artiste->contains($artiste)) {
            $this->artiste[] = $artiste;
        }

        return $this;
    }

    public function removeartiste(Artiste $artiste): self
    {
        $this->artiste->removeElement($artiste);

        return $this;
    }
}
