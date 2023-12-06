<?php

namespace App\Entity;

use App\Repository\MakeAccessRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MakeAccessRepository::class)]
class MakeAccess
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'makeAccesses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BingoGrid $idGrid = null;

    #[ORM\ManyToOne(inversedBy: 'makeAccesses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $iduser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdGrid(): ?BingoGrid
    {
        return $this->idGrid;
    }

    public function setIdGrid(?BingoGrid $idGrid): static
    {
        $this->idGrid = $idGrid;

        return $this;
    }

    public function getIduser(): ?Users
    {
        return $this->iduser;
    }

    public function setIduser(?Users $iduser): static
    {
        $this->iduser = $iduser;

        return $this;
    }
}
