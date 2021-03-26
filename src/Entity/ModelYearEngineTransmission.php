<?php

namespace App\Entity;

use App\Repository\ModelYearEngineTransmissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModelYearEngineTransmissionRepository::class)
 */
class ModelYearEngineTransmission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ModelYearEngine::class, inversedBy="modelYearEngineTransmissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $modelYearEngine;

    /**
     * @ORM\ManyToOne(targetEntity=Transmission::class, inversedBy="modelYearEngineTransmissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $transmission;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="modelYearEngineTransmission")
     */
    private $products;



    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModelYearEngine(): ?ModelYearEngine
    {
        return $this->modelYearEngine;
    }

    public function setModelYearEngine(?ModelYearEngine $modelYearEngine): self
    {
        $this->modelYearEngine = $modelYearEngine;

        return $this;
    }

    public function getTransmission(): ?Transmission
    {
        return $this->transmission;
    }

    public function setTransmission(?Transmission $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }


    public function __toString()
    {
        return $this->modelYearEngine.'-'.$this->transmission;
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
            $product->setModelYearEngineTransmission($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getModelYearEngineTransmission() === $this) {
                $product->setModelYearEngineTransmission(null);
            }
        }

        return $this;
    }

}
