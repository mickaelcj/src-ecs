<?php

namespace FrontOffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentDetails
 *
 * @ORM\Table(name="payment_details", indexes={@ORM\Index(name="payment_details_payment_data", columns={"payment_data_id"}), @ORM\Index(name="payment_details_shipment", columns={"shipment_id"})})
 * @ORM\Entity
 */
class PaymentDetails
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
     * @ORM\Column(name="value", type="string", length=255, nullable=false)
     */
    private $value;

    /**
     * @var \PaymentData
     *
     * @ORM\ManyToOne(targetEntity="PaymentData")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="payment_data_id", referencedColumnName="id")
     * })
     */
    private $paymentData;

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
