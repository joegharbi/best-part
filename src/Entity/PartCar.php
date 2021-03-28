<?php

namespace App\Entity;

use App\Repository\PartCarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartCarRepository::class)
 */
class PartCar
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="partCars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $part;

    /**
     * @ORM\ManyToOne(targetEntity=Car::class, inversedBy="partCars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $car;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPart(): ?Product
    {
        return $this->part;
    }

    public function setPart(?Product $part): self
    {
        $this->part = $part;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }
}
