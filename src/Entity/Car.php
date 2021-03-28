<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=MaterialMaster::class, inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $make;

    /**
     * @ORM\ManyToOne(targetEntity=MaterialMaster::class, inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity=MaterialMaster::class, inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $engine;

    /**
     * @ORM\ManyToOne(targetEntity=MaterialMaster::class, inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $year;

    /**
     * @ORM\ManyToOne(targetEntity=MaterialMaster::class, inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $transmission;

    /**
     * @ORM\OneToMany(targetEntity=PartCar::class, mappedBy="car", orphanRemoval=true)
     */
    private $partCars;

    public function __construct()
    {
        $this->partCars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMake(): ?MaterialMaster
    {
        return $this->make;
    }

    public function setMake(?MaterialMaster $make): self
    {
        $this->make = $make;

        return $this;
    }

    public function getModel(): ?MaterialMaster
    {
        return $this->model;
    }

    public function setModel(?MaterialMaster $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getEngine(): ?MaterialMaster
    {
        return $this->engine;
    }

    public function setEngine(?MaterialMaster $engine): self
    {
        $this->engine = $engine;

        return $this;
    }

    public function getYear(): ?MaterialMaster
    {
        return $this->year;
    }

    public function setYear(?MaterialMaster $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getTransmission(): ?MaterialMaster
    {
        return $this->transmission;
    }

    public function setTransmission(?MaterialMaster $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * @return Collection|PartCar[]
     */
    public function getPartCars(): Collection
    {
        return $this->partCars;
    }

    public function addPartCar(PartCar $partCar): self
    {
        if (!$this->partCars->contains($partCar)) {
            $this->partCars[] = $partCar;
            $partCar->setCar($this);
        }

        return $this;
    }

    public function removePartCar(PartCar $partCar): self
    {
        if ($this->partCars->removeElement($partCar)) {
            // set the owning side to null (unless already changed)
            if ($partCar->getCar() === $this) {
                $partCar->setCar(null);
            }
        }

        return $this;
    }

    public function __toString()
    {

        return $this->make.'-'.$this->model.'-'.$this->year.'-'.$this->engine.'-'.$this->transmission;
    }
}
