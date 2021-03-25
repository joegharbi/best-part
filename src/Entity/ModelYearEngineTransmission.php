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
     * @ORM\OneToMany(targetEntity=PartModel::class, mappedBy="model", orphanRemoval=true)
     */
    private $partModels;


    public function __construct()
    {
        $this->partModels = new ArrayCollection();
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

    /**
     * @return Collection|PartModel[]
     */
    public function getPartModels(): Collection
    {
        return $this->partModels;
    }

    public function addPartModel(PartModel $partModel): self
    {
        if (!$this->partModels->contains($partModel)) {
            $this->partModels[] = $partModel;
            $partModel->setModel($this);
        }

        return $this;
    }

    public function removePartModel(PartModel $partModel): self
    {
        if ($this->partModels->removeElement($partModel)) {
            // set the owning side to null (unless already changed)
            if ($partModel->getModel() === $this) {
                $partModel->setModel(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->modelYearEngine.'-'.$this->transmission;
    }

}
