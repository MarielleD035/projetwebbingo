<?php

namespace App\Entity;

use App\Repository\BingoGridRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'bingoGrid', targetEntity: Cell::class)]
    private Collection $cells;

    public function __construct()
    {
        $this->cells = new ArrayCollection();
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }

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

    /**
     * @return Collection<int, Cell>
     */
    public function getCells(): Collection
    {
        return $this->cells;
    }

    public function addCell(Cell $cell): static
    {
        if (!$this->cells->contains($cell)) {
            $this->cells->add($cell);
            $cell->setBingoGrid($this);
        }

        return $this;
    }

    public function removeCell(Cell $cell): static
    {
        if ($this->cells->removeElement($cell)) {
            // set the owning side to null (unless already changed)
            if ($cell->getBingoGrid() === $this) {
                $cell->setBingoGrid(null);
            }
        }

        return $this;
    }
}