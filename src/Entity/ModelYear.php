<?php

namespace App\Entity;

use App\Repository\ModelYearRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModelYearRepository::class)
 */
class ModelYear
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Model::class, inversedBy="modelYears")
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity=Year::class, inversedBy="modelYears")
     * @ORM\JoinColumn(nullable=false)
     */
    private $year;

    /**
     * @ORM\OneToMany(targetEntity=ModelYearEngine::class, mappedBy="modelYear", orphanRemoval=true)
     */
    private $modelYearEngines;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="modelYear")
     */
    private $products;

    public function __construct()
    {
        $this->modelYearEngines = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getYear(): ?Year
    {
        return $this->year;
    }

    public function setYear(?Year $year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return Collection|ModelYearEngine[]
     */
    public function getModelYearEngines(): Collection
    {
        return $this->modelYearEngines;
    }

    public function addModelYearEngine(ModelYearEngine $modelYearEngine): self
    {
        if (!$this->modelYearEngines->contains($modelYearEngine)) {
            $this->modelYearEngines[] = $modelYearEngine;
            $modelYearEngine->setModelYear($this);
        }

        return $this;
    }

    public function removeModelYearEngine(ModelYearEngine $modelYearEngine): self
    {
        if ($this->modelYearEngines->removeElement($modelYearEngine)) {
            // set the owning side to null (unless already changed)
            if ($modelYearEngine->getModelYear() === $this) {
                $modelYearEngine->setModelYear(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->model.'-'.$this->year;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setModelYear($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getModelYear() === $this) {
                $product->setModelYear(null);
            }
        }

        return $this;
    }
}
