<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
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

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $voornaam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $achternaam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $geboortedatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefoonnummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $woonplaats;

    /**
     * @ORM\Column(type="string", length=10000, nullable=true)
     */
    private $motivatie;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $cv;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $record_type;

    /**
     * @ORM\OneToMany(targetEntity=Sollicitatie::class, mappedBy="werknemer")
     */
    private $sollicitaties;

    /**
     * @ORM\OneToMany(targetEntity=Vacature::class, mappedBy="werkgever")
     */
    private $vacatures;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $foto;

    public function __construct()
    {
        $this->sollicitaties = new ArrayCollection();
        $this->vacatures = new ArrayCollection();
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
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
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

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
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

    public function getVoornaam(): ?string
    {
        return $this->voornaam;
    }

    public function setVoornaam(string $voornaam): self
    {
        $this->voornaam = $voornaam;

        return $this;
    }

    public function getAchternaam(): ?string
    {
        return $this->achternaam;
    }

    public function setAchternaam(?string $achternaam): self
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    public function getGeboortedatum(): ?string
    {
        return $this->geboortedatum;
    }

    public function setGeboortedatum(?string $geboortedatum): self
    {
        $this->geboortedatum = $geboortedatum;

        return $this;
    }

    public function getTelefoonnummer(): ?string
    {
        return $this->telefoonnummer;
    }

    public function setTelefoonnummer(string $telefoonnummer): self
    {
        $this->telefoonnummer = $telefoonnummer;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getWoonplaats(): ?string
    {
        return $this->woonplaats;
    }

    public function setWoonplaats(string $woonplaats): self
    {
        $this->woonplaats = $woonplaats;

        return $this;
    }

    public function getMotivatie(): ?string
    {
        return $this->motivatie;
    }

    public function setMotivatie(?string $motivatie): self
    {
        $this->motivatie = $motivatie;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(?string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getRecordType(): ?string
    {
        return $this->record_type;
    }

    public function setRecordType(string $record_type): self
    {
        $this->record_type = $record_type;

        return $this;
    }

    /**
     * @return Collection|Sollicitatie[]
     */
    public function getSollicitaties(): Collection
    {
        return $this->sollicitaties;
    }

    public function addSollicitaty(Sollicitatie $sollicitaty): self
    {
        if (!$this->sollicitaties->contains($sollicitaty)) {
            $this->sollicitaties[] = $sollicitaty;
            $sollicitaty->setWerknemer($this);
        }

        return $this;
    }

    public function removeSollicitaty(Sollicitatie $sollicitaty): self
    {
        if ($this->sollicitaties->removeElement($sollicitaty)) {
            // set the owning side to null (unless already changed)
            if ($sollicitaty->getWerknemer() === $this) {
                $sollicitaty->setWerknemer(null);
            }
        }

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
            $vacature->setWerkgever($this);
        }

        return $this;
    }

    public function removeVacature(Vacature $vacature): self
    {
        if ($this->vacatures->removeElement($vacature)) {
            // set the owning side to null (unless already changed)
            if ($vacature->getWerkgever() === $this) {
                $vacature->setWerkgever(null);
            }
        }

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }
}
