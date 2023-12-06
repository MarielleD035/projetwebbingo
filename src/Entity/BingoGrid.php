<?php

namespace App\Entity;

use App\Repository\BingoGridRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BingoGridRepository::class)]
class BingoGrid
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $gridname = null;

    #[ORM\ManyToOne(inversedBy: 'bingoGrids')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $idUser = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGridname(): ?string
    {
        return $this->gridname;
    }

    public function setGridname(string $gridname): static
    {
        $this->gridname = $gridname;

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