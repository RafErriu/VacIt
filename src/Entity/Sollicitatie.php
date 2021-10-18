<?php

namespace App\Entity;

use App\Repository\SollicitatieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SollicitatieRepository::class)
 */
class Sollicitatie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uitgenodigd;

    /**
     * @ORM\ManyToOne(targetEntity=Vacature::class, inversedBy="sollicitaties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vacature;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sollicitaties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $werknemer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getUitgenodigd(): ?string
    {
        return $this->uitgenodigd;
    }

    public function setUitgenodigd(string $uitgenodigd): self
    {
        $this->uitgenodigd = $uitgenodigd;

        return $this;
    }

    public function getVacature(): ?Vacature
    {
        return $this->vacature;
    }

    public function setVacature(?Vacature $vacature): self
    {
        $this->vacature = $vacature;

        return $this;
    }

    public function getWerknemer(): ?User
    {
        return $this->werknemer;
    }

    public function setWerknemer(?User $werknemer): self
    {
        $this->werknemer = $werknemer;

        return $this;
    }
}
