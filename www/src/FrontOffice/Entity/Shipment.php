<?php

namespace FrontOffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shipment
 *
 * @ORM\Table(name="shipment", indexes={@ORM\Index(name="shipment_shipment_type", columns={"shipment_type_id"}), @ORM\Index(name="shipment_client", columns={"client_id"}), @ORM\Index(name="shipment_payment_type", columns={"payment_type_id"})})
 * @ORM\Entity
 */
class Shipment
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
     * @var \DateTime
     *
     * @ORM\Column(name="time_created", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timeCreated = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_address", type="text", length=65535, nullable=false)
     */
    private $shippingAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_address", type="text", length=65535, nullable=false)
     */
    private $billingAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="products_price", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $productsPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_cost", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $deliveryCost;

    /**
     * @var string
     *
     * @ORM\Column(name="discount", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $discount;

    /**
     * @var string
     *
     * @ORM\Column(name="final_price", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $finalPrice;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;

    /**
     * @var \PaymentType
     *
     * @ORM\ManyToOne(targetEntity="PaymentType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="payment_type_id", referencedColumnName="id")
     * })
     */
    private $paymentType;

    /**
     * @var \ShipmentType
     *
     * @ORM\ManyToOne(targetEntity="ShipmentType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shipment_type_id", referencedColumnName="id")
     * })
     */
    private $shipmentType;


}
