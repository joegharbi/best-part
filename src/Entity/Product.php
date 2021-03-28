<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTime;


/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @Vich\Uploadable()
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Name should not be empty")
     * @Assert\Length(min="4",max="255",minMessage="Name should not be less than 4 caracters",maxMessage="Name should be less than 40 caracters")
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank (message="Write price for the product please")
     * @Assert\Positive(message="Price should be strictly positive")
     * @Assert\LessThanOrEqual(value="99999",message="Price shoulde be less than 99999 euros")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

//    /**
//     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
//     * @Assert\NotBlank (message="Please choose a valid category")
//     */
//    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mainPicture;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="give a valid short description")
     * @Assert\Length(min="10",minMessage="This should be more than 10 caracters at least")
     */
    private $shortDescription;

    /**
     * @ORM\OneToMany(targetEntity=PurchaseItem::class, mappedBy="product",cascade="all")
     */
    private $purchaseItems;

    /**
     * @ORM\ManyToOne(targetEntity=SubCategory::class, inversedBy="products")
     */
    private $subCategory;

    /**
     * @Vich\UploadableField(mapping="mainPictures",fileNameProperty="mainPicture")
     */
    private $mainPictureFile;

    /**
     * @return mixed
     */
    public function getMainPictureFile()
    {
        return $this->mainPictureFile;
    }

    /**
     * @param mixed $mainPictureFile
     */
    public function setMainPictureFile($mainPictureFile): void
    {
        $this->mainPictureFile = $mainPictureFile;
    }

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $available;

    /**
     * @ORM\OneToMany(targetEntity=PartCar::class, mappedBy="part", orphanRemoval=true)
     */
    private $partCars;



    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }


    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }


    public function __construct()
    {
        $this->purchaseItems = new ArrayCollection();
        $this->partCars = new ArrayCollection();
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        if (empty($this->updatedAt)) {
            $this->updatedAt = new DateTime();
        }

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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

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

    public function getMainPicture(): ?string
    {
        return $this->mainPicture;
    }

    public function setMainPicture(?string $mainPicture): self
    {
        $this->mainPicture = $mainPicture;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * @return Collection|PurchaseItem[]
     */
    public function getPurchaseItems(): Collection
    {
        return $this->purchaseItems;
    }

    public function addPurchaseItem(PurchaseItem $purchaseItem): self
    {
        if (!$this->purchaseItems->contains($purchaseItem)) {
            $this->purchaseItems[] = $purchaseItem;
            $purchaseItem->setProduct($this);
        }

        return $this;
    }

    public function removePurchaseItem(PurchaseItem $purchaseItem): self
    {
        if ($this->purchaseItems->removeElement($purchaseItem)) {
            // set the owning side to null (unless already changed)
            if ($purchaseItem->getProduct() === $this) {
                $purchaseItem->setProduct(null);
            }
        }

        return $this;
    }

    public function getSubCategory(): ?SubCategory
    {
        return $this->subCategory;
    }

    public function setSubCategory(?SubCategory $subCategory): self
    {
        $this->subCategory = $subCategory;

        return $this;
    }


    public function __toString()
    {
        return $this->name;
    }

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;

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
            $partCar->setPart($this);
        }

        return $this;
    }

    public function removePartCar(PartCar $partCar): self
    {
        if ($this->partCars->removeElement($partCar)) {
            // set the owning side to null (unless already changed)
            if ($partCar->getPart() === $this) {
                $partCar->setPart(null);
            }
        }

        return $this;
    }

}
