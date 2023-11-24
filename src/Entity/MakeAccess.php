<?php

namespace App\Entity;

use App\Repository\MakeAccessRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MakeAccessRepository::class)]
class MakeAccess
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Users::class)]
    private Collection $iduser;

    #[ORM\ManyToMany(targetEntity: BingoGrid::class)]
    private Collection $idgrid;

    public function __construct()
    {
        $this->iduser = new ArrayCollection();
        $this->idgrid = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getIduser(): Collection
    {
        return $this->iduser;
    }

    public function addIduser(Users $iduser): static
    {
        if (!$this->iduser->contains($iduser)) {
            $this->iduser->add($iduser);
        }

        return $this;
    }

    public function removeIduser(Users $iduser): static
    {
        $this->iduser->removeElement($iduser);

        return $this;
    }

    /**
     * @return Collection<int, BingoGrid>
     */
    public function getIdgrid(): Collection
    {
        return $this->idgrid;
    }

    public function addIdgrid(BingoGrid $idgrid): static
    {
        if (!$this->idgrid->contains($idgrid)) {
            $this->idgrid->add($idgrid);
        }

        return $this;
    }

    public function removeIdgrid(BingoGrid $idgrid): static
    {
        $this->idgrid->removeElement($idgrid);

        return $this;
    }
}
