<?php

namespace FrontOffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShipmentDetails
 *
 * @ORM\Table(name="shipment_details", uniqueConstraints={@ORM\UniqueConstraint(name="shipmet_details_ak_1", columns={"shipment_id", "product_id"})}, indexes={@ORM\Index(name="shipmet_details_product", columns={"product_id"}), @ORM\Index(name="IDX_998E0D2F7BE036FC", columns={"shipment_id"})})
 * @ORM\Entity
 */
class ShipmentDetails
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
     * @ORM\Column(name="quanitity", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $quanitity;

    /**
     * @var string
     *
     * @ORM\Column(name="price_per_unit", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $pricePerUnit;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var \Shipment
     *
     * @ORM\ManyToOne(targetEntity="Shipment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shipment_id", referencedColumnName="id")
     * })
     */
    private $shipment;


}
