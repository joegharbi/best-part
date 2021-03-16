<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Please write a categry name")
     * @Assert\Length (min="3",max="255",minMessage="Category name should not be less than 3 caracters")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

//    /**
//     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="category")
//     */
//    private $products;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="categories")
     */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity=SubCategory::class, mappedBy="category")
     */
    private $subCategories;


//    /**
//     * @ORM\OneToOne(targetEntity=SubCategory::class, inversedBy="category", cascade={"persist", "remove"})
//     */
//    private $subCategory;

    public function __construct()
    {
//        $this->products = new ArrayCollection();
$this->subCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
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
//
//    /**
//     * @return Collection|Product[]
//     */
//    public function getProducts(): Collection
//    {
//        return $this->products;
//    }
//
//    public function addProduct(Product $product): self
//    {
//        if (!$this->products->contains($product)) {
//            $this->products[] = $product;
//            $product->setCategory($this);
//        }
//
//        return $this;
//    }
//
//    public function removeProduct(Product $product): self
//    {
//        if ($this->products->removeElement($product)) {
//            // set the owning side to null (unless already changed)
//            if ($product->getCategory() === $this) {
//                $product->setCategory(null);
//            }
//        }
//
//        return $this;
//    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
//
//    public function getSubCategory(): ?SubCategory
//    {
//        return $this->subCategory;
//    }
//
//    public function setSubCategory(?SubCategory $subCategory): self
//    {
//        $this->subCategory = $subCategory;
//
//        return $this;
//    }

/**
 * @return Collection|SubCategory[]
 */
public function getSubCategories(): Collection
{
    return $this->subCategories;
}

public function addSubCategory(SubCategory $subCategory): self
{
    if (!$this->subCategories->contains($subCategory)) {
        $this->subCategories[] = $subCategory;
        $subCategory->setCategory($this);
    }

    return $this;
}

public function removeSubCategory(SubCategory $subCategory): self
{
    if ($this->subCategories->removeElement($subCategory)) {
        // set the owning side to null (unless already changed)
        if ($subCategory->getCategory() === $this) {
            $subCategory->setCategory(null);
        }
    }

    return $this;
}

}
