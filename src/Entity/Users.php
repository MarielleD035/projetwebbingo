<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'idUser', targetEntity: ReadAccess::class)]
    private Collection $readAccesses;

    #[ORM\OneToMany(mappedBy: 'iduser', targetEntity: MakeAccess::class)]
    private Collection $makeAccesses;

    #[ORM\Column]
    private ?bool $isActif = TRUE;



    public function __construct()
    {
        $this->bingoGrids = new ArrayCollection();
        $this->readAccesses = new ArrayCollection();
        $this->makeAccesses = new ArrayCollection();
    }
    public function __toString(): string
    {
        return (string) $this->id;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
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
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
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

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, ReadAccess>
     */
    public function getReadAccesses(): Collection
    {
        return $this->readAccesses;
    }

    public function addReadAccess(ReadAccess $readAccess): static
    {
        if (!$this->readAccesses->contains($readAccess)) {
            $this->readAccesses->add($readAccess);
            $readAccess->setIdUser($this);
        }

        return $this;
    }

    public function removeReadAccess(ReadAccess $readAccess): static
    {
        if ($this->readAccesses->removeElement($readAccess)) {
            // set the owning side to null (unless already changed)
            if ($readAccess->getIdUser() === $this) {
                $readAccess->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MakeAccess>
     */
    public function getMakeAccesses(): Collection
    {
        return $this->makeAccesses;
    }

    public function addMakeAccess(MakeAccess $makeAccess): static
    {
        if (!$this->makeAccesses->contains($makeAccess)) {
            $this->makeAccesses->add($makeAccess);
            $makeAccess->setIduser($this);
        }

        return $this;
    }

    public function removeMakeAccess(MakeAccess $makeAccess): static
    {
        if ($this->makeAccesses->removeElement($makeAccess)) {
            // set the owning side to null (unless already changed)
            if ($makeAccess->getIduser() === $this) {
                $makeAccess->setIduser(null);
            }
        }

        return $this;
    }

    public function isIsActif(): ?bool
    {
        return $this->isActif;
    }

    public function setIsActif(bool $isActif): static
    {
        $this->isActif = $isActif;

        return $this;
    }

}
