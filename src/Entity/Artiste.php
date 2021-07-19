<?php

namespace App\Entity;

use App\Repository\ArtisteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArtisteRepository::class)
 */
class Artiste
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
    private $nomArtiste;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriptionArtiste;


    /**
     * @ORM\ManyToMany(targetEntity=Son::class, mappedBy="artiste")
     */
    private $sons;

    public function __construct()
    {
        $this->son = new ArrayCollection();
        $this->sons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomArtiste(): ?string
    {
        return $this->nomArtiste;
    }

    public function setNomArtiste(string $nomArtiste): self
    {
        $this->nomArtiste = $nomArtiste;

        return $this;
    }

    public function getDescriptionArtiste(): ?string
    {
        return $this->descriptionArtiste;
    }

    public function setDescriptionArtiste(string $descriptionArtiste): self
    {
        $this->descriptionArtiste = $descriptionArtiste;

        return $this;
    }

    public function __toString() {
        return $this->getNomArtiste();
        }
    

    /**
     * @return Collection|Son[]
     */
    public function getSons(): Collection
    {
        return $this->sons;
    }

    public function addSon(Son $son): self
    {
        if (!$this->sons->contains($son)) {
            $this->sons[] = $son;
            $son->setAuteur($this);
        }

        return $this;
    }

    public function removeSon(Son $son): self
    {
        if ($this->sons->removeElement($son)) {
            // set the owning side to null (unless already changed)
            if ($son->getAuteur() === $this) {
                $son->setAuteur(null);
            }
        }

        return $this;
    }
}
