<?php

namespace App\Entity;

use App\Repository\ModelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ModelRepository::class)
 */
class Model
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
    private $name;


    /**
     * @ORM\ManyToOne(targetEntity=Make::class, inversedBy="models")
     * @ORM\JoinColumn(nullable=false)
     */
    private $make;

    /**
     * @ORM\OneToMany(targetEntity=ModelYear::class, mappedBy="model", orphanRemoval=true)
     */
    private $modelYears;


    public function __construct()
    {
        $this->modelYears = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public function getMake(): ?Make
    {
        return $this->make;
    }

    public function setMake(?Make $make): self
    {
        $this->make = $make;

        return $this;
    }


    public function __toString()
    {
        return $this->name;
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
            $modelYear->setModel($this);
        }

        return $this;
    }

    public function removeModelYear(ModelYear $modelYear): self
    {
        if ($this->modelYears->removeElement($modelYear)) {
            // set the owning side to null (unless already changed)
            if ($modelYear->getModel() === $this) {
                $modelYear->setModel(null);
            }
        }

        return $this;
    }

}