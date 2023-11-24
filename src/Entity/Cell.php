<?php

namespace App\Entity;

use App\Repository\CellRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CellRepository::class)]
class Cell
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?int $coordX = null;

    #[ORM\Column]
    private ?int $coordY = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $content = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?BingoGrid $idgrid = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoordX(): ?int
    {
        return $this->coordX;
    }

    public function setCoordX(int $coordX): static
    {
        $this->coordX = $coordX;

        return $this;
    }

    public function getCoordY(): ?int
    {
        return $this->coordY;
    }

    public function setCoordY(int $coordY): static
    {
        $this->coordY = $coordY;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getIdgrid(): ?BingoGrid
    {
        return $this->idgrid;
    }

    public function setIdgrid(?BingoGrid $idgrid): static
    {
        $this->idgrid = $idgrid;

        return $this;
    }
}
