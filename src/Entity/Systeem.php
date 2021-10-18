<?php

namespace App\Entity;

use App\Repository\SysteemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SysteemRepository::class)
 */
class Systeem
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
    private $naam;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $plaatje;

    /**
     * @ORM\OneToMany(targetEntity=Vacature::class, mappedBy="systeem")
     */
    private $vacatures;

    public function __construct()
    {
        $this->vacatures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getPlaatje(): ?string
    {
        return $this->plaatje;
    }

    public function setPlaatje(string $plaatje): self
    {
        $this->plaatje = $plaatje;

        return $this;
    }

    /**
     * @return Collection|Vacature[]
     */
    public function getVacatures(): Collection
    {
        return $this->vacatures;
    }

    public function addVacature(Vacature $vacature): self
    {
        if (!$this->vacatures->contains($vacature)) {
            $this->vacatures[] = $vacature;
            $vacature->setSysteem($this);
        }

        return $this;
    }

    public function removeVacature(Vacature $vacature): self
    {
        if ($this->vacatures->removeElement($vacature)) {
            // set the owning side to null (unless already changed)
            if ($vacature->getSysteem() === $this) {
                $vacature->setSysteem(null);
            }
        }

        return $this;
    }
}
