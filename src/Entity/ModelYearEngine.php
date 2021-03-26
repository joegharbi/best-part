<?php

namespace App\Entity;

use App\Repository\ModelYearEngineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModelYearEngineRepository::class)
 */
class ModelYearEngine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ModelYear::class, inversedBy="modelYearEngines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $modelYear;

    /**
     * @ORM\ManyToOne(targetEntity=Engine::class, inversedBy="modelYearEngines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $engine;

    /**
     * @ORM\OneToMany(targetEntity=ModelYearEngineTransmission::class, mappedBy="modelYearEngine", orphanRemoval=true)
     */
    private $modelYearEngineTransmissions;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="modelYearEngine")
     */
    private $products;

    public function __construct()
    {
        $this->modelYearEngineTransmissions = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModelYear(): ?ModelYear
    {
        return $this->modelYear;
    }

    public function setModelYear(?ModelYear $modelYear): self
    {
        $this->modelYear = $modelYear;

        return $this;
    }

    public function getEngine(): ?Engine
    {
        return $this->engine;
    }

    public function setEngine(?Engine $engine): self
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * @return Collection|ModelYearEngineTransmission[]
     */
    public function getModelYearEngineTransmissions(): Collection
    {
        return $this->modelYearEngineTransmissions;
    }

    public function addModelYearEngineTransmission(ModelYearEngineTransmission $modelYearEngineTransmission): self
    {
        if (!$this->modelYearEngineTransmissions->contains($modelYearEngineTransmission)) {
            $this->modelYearEngineTransmissions[] = $modelYearEngineTransmission;
            $modelYearEngineTransmission->setModelYearEngine($this);
        }

        return $this;
    }

    public function removeModelYearEngineTransmission(ModelYearEngineTransmission $modelYearEngineTransmission): self
    {
        if ($this->modelYearEngineTransmissions->removeElement($modelYearEngineTransmission)) {
            // set the owning side to null (unless already changed)
            if ($modelYearEngineTransmission->getModelYearEngine() === $this) {
                $modelYearEngineTransmission->setModelYearEngine(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->modelYear.'-'.$this->engine;
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
            $product->setModelYearEngine($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getModelYearEngine() === $this) {
                $product->setModelYearEngine(null);
            }
        }

        return $this;
    }
}
