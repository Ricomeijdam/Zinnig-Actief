<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RuimteRepository")
 */
class Ruimte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $locatie;

    /**
     * @ORM\Column(type="integer")
     */
    private $plekken;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Workshop", mappedBy="ruimte")
     */
    private $workshops;

    public function __construct()
    {
        $this->workshops = new ArrayCollection();
    }

    public function  __toString()
    {
        return $this->getLocatie();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocatie(): ?string
    {
        return $this->locatie;
    }

    public function setLocatie(string $locatie): self
    {
        $this->locatie = $locatie;

        return $this;
    }

    public function getPlekken(): ?int
    {
        return $this->plekken;
    }

    public function setPlekken(int $plekken): self
    {
        $this->plekken = $plekken;

        return $this;
    }

    /**
     * @return Collection|Workshop[]
     */
    public function getWorkshops(): Collection
    {
        return $this->workshops;
    }

    public function addWorkshop(Workshop $workshop): self
    {
        if (!$this->workshops->contains($workshop)) {
            $this->workshops[] = $workshop;
            $workshop->setRuimte($this);
        }

        return $this;
    }

    public function removeWorkshop(Workshop $workshop): self
    {
        if ($this->workshops->contains($workshop)) {
            $this->workshops->removeElement($workshop);
            // set the owning side to null (unless already changed)
            if ($workshop->getRuimte() === $this) {
                $workshop->setRuimte(null);
            }
        }

        return $this;
    }
}
