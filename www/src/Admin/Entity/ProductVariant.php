<?php

namespace Admin\Entity;

use Core\Entity\IdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product Variant
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="product_product_variant", columns={"product_variant_id"})})
 * @ORM\Entity
 */
class ProductVariant
{

    use IdTrait;

    /**
     * @ORM\Column(type="array", name="variant")
     */
    private $variant = [];

    /**
     * @ORM\Column(type="integer", name="stock")
     */
    private $stock;

    /**
     * @var Product
     *
     * @ManyToOne(targetEntity="Admin\Entity\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     **/
    private $product;

    public function getVariant(): ?array
    {
        return $this->variant;
    }

    public function setVariant(array $variant): self
    {
        $this->variant = $variant;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}

