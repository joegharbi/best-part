<?php

namespace App\Entity;

use App\Repository\TransmissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransmissionRepository::class)
 */
class Transmission
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
     * @ORM\OneToMany(targetEntity=ModelYearEngineTransmission::class, mappedBy="transmission", orphanRemoval=true)
     */
    private $modelYearEngineTransmissions;

    public function __construct()
    {
        $this->modelYearEngineTransmissions = new ArrayCollection();
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
            $modelYearEngineTransmission->setTransmission($this);
        }

        return $this;
    }

    public function removeModelYearEngineTransmission(ModelYearEngineTransmission $modelYearEngineTransmission): self
    {
        if ($this->modelYearEngineTransmissions->removeElement($modelYearEngineTransmission)) {
            // set the owning side to null (unless already changed)
            if ($modelYearEngineTransmission->getTransmission() === $this) {
                $modelYearEngineTransmission->setTransmission(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
