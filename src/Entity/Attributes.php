<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AttributesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AttributesRepository::class)
 */
#[ApiResource]
class Attributes
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=ProductAttributes::class, mappedBy="product_id", orphanRemoval=true)
     */
    private $attribute_id;


    public function __construct()
    {
        $this->attribute_id = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|ProductAttributes[]
     */
    public function getAttributeId(): Collection
    {
        return $this->attribute_id;
    }

    public function addAttributeId(ProductAttributes $attributeId): self
    {
        if (!$this->attribute_id->contains($attributeId)) {
            $this->attribute_id[] = $attributeId;
            $attributeId->setProductId($this);
        }

        return $this;
    }

    public function removeAttributeId(ProductAttributes $attributeId): self
    {
        if ($this->attribute_id->removeElement($attributeId)) {
            // set the owning side to null (unless already changed)
            if ($attributeId->getProductId() === $this) {
                $attributeId->setProductId(null);
            }
        }

        return $this;
    }
}
