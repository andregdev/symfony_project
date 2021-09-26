<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductAttributesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductAttributesRepository::class)
 */
#[ApiResource]
class ProductAttributes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Products::class, inversedBy="attribute_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product_id;

    /**
     * @ORM\ManyToOne(targetEntity=Attributes::class, inversedBy="productAttributes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $attribute_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductId(): ?Products
    {
        return $this->product_id;
    }

    public function setProductId(?Products $product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function getAttributeId(): ?Attributes
    {
        return $this->attribute_id;
    }

    public function setAttributeId(?Attributes $attribute_id): self
    {
        $this->attribute_id = $attribute_id;

        return $this;
    }
}
