<?php

namespace App\Entity;

use App\Repository\PartModelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartModelRepository::class)
 */
class PartModel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="partModels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $part;

    /**
     * @ORM\ManyToOne(targetEntity=ModelYearEngineTransmission::class, inversedBy="partModels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $model;

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

    public function getModel(): ?ModelYearEngineTransmission
    {
        return $this->model;
    }

    public function setModel(?ModelYearEngineTransmission $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function __toString()
    {
        return $this->getModel().$this->getPart();
    }
}
