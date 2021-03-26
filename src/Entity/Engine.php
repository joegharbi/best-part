<?php

namespace App\Entity;

use App\Repository\EngineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EngineRepository::class)
 */
class Engine
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
     * @ORM\OneToMany(targetEntity=ModelYearEngine::class, mappedBy="engine", orphanRemoval=true)
     */
    private $modelYearEngines;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    public function __construct()
    {
        $this->modelYearEngines = new ArrayCollection();
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
            $modelYearEngine->setEngine($this);
        }

        return $this;
    }

    public function removeModelYearEngine(ModelYearEngine $modelYearEngine): self
    {
        if ($this->modelYearEngines->removeElement($modelYearEngine)) {
            // set the owning side to null (unless already changed)
            if ($modelYearEngine->getEngine() === $this) {
                $modelYearEngine->setEngine(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
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
