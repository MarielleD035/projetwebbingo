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


    #[ORM\OneToMany(mappedBy: 'bingoGrid', targetEntity: Cell::class)]
    private Collection $cells;

    #[ORM\OneToMany(mappedBy: 'idGrid', targetEntity: ReadAccess::class)]
    private Collection $readAccesses;

    #[ORM\OneToMany(mappedBy: 'idGrid', targetEntity: MakeAccess::class)]
    private Collection $makeAccesses;



    public function __construct()
    {
        $this->cells = new ArrayCollection();
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

    public function getGridname(): ?string
    {
        return $this->gridname;
    }

    public function setGridname(string $gridname): static
    {
        $this->gridname = $gridname;

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
            $readAccess->setIdGrid($this);
        }

        return $this;
    }

    public function removeReadAccess(ReadAccess $readAccess): static
    {
        if ($this->readAccesses->removeElement($readAccess)) {
            // set the owning side to null (unless already changed)
            if ($readAccess->getIdGrid() === $this) {
                $readAccess->setIdGrid(null);
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
            $makeAccess->setIdGrid($this);
        }

        return $this;
    }

    public function removeMakeAccess(MakeAccess $makeAccess): static
    {
        if ($this->makeAccesses->removeElement($makeAccess)) {
            // set the owning side to null (unless already changed)
            if ($makeAccess->getIdGrid() === $this) {
                $makeAccess->setIdGrid(null);
            }
        }

        return $this;
    }

  
}