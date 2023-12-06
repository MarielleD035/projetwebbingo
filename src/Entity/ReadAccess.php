<?php

namespace App\Entity;

use App\Repository\ReadAccessRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReadAccessRepository::class)]
class ReadAccess
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'readAccesses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BingoGrid $idGrid = null;

    #[ORM\ManyToOne(inversedBy: 'readAccesses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $idUser = null;

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

    public function getIdUser(): ?Users
    {
        return $this->idUser;
    }

    public function setIdUser(?Users $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }
}
