<?php

namespace App\Entity;

use App\Repository\YearRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=YearRepository::class)
 */
class Year
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $year;

    /**
     * @ORM\OneToMany(targetEntity=ModelYear::class, mappedBy="year", orphanRemoval=true)
     */
    private $modelYears;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    public function __construct()
    {
        $this->modelYears = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function __toString()
    {
        return $this->year;
    }

    /**
     * @return Collection|ModelYear[]
     */
    public function getModelYears(): Collection
    {
        return $this->modelYears;
    }

    public function addModelYear(ModelYear $modelYear): self
    {
        if (!$this->modelYears->contains($modelYear)) {
            $this->modelYears[] = $modelYear;
            $modelYear->setYear($this);
        }

        return $this;
    }

    public function removeModelYear(ModelYear $modelYear): self
    {
        if ($this->modelYears->removeElement($modelYear)) {
            // set the owning side to null (unless already changed)
            if ($modelYear->getYear() === $this) {
                $modelYear->setYear(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

}
