<?php

namespace FrontOffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="product_product_type", columns={"product_type_id"})})
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=64, nullable=false)
     */
    private $productName;

    /**
     * @var string
     *
     * @ORM\Column(name="product_description", type="string", length=255, nullable=false)
     */
    private $productDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="unit", type="string", length=16, nullable=false)
     */
    private $unit;

    /**
     * @var string
     *
     * @ORM\Column(name="price_per_unit", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $pricePerUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="product_short_desc", type="text", length=65535, nullable=false)
     */
    private $productShortDesc;

    /**
     * @var int
     *
     * @ORM\Column(name="promo", type="integer", nullable=false)
     */
    private $promo;

    /**
     * @var \ProductType
     *
     * @ORM\ManyToOne(targetEntity="ProductType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_type_id", referencedColumnName="id")
     * })
     */
    private $productType;


}
