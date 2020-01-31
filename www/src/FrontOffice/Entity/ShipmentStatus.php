<?php

namespace FrontOffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShipmentStatus
 *
 * @ORM\Table(name="shipment_status", indexes={@ORM\Index(name="shipment_status_shipment", columns={"shipment_id"}), @ORM\Index(name="shipment_status_status_catalog", columns={"status_catalog_id"})})
 * @ORM\Entity
 */
class ShipmentStatus
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
     * @ORM\Column(name="status_time", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $statusTime = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="text", length=65535, nullable=true)
     */
    private $notes;

    /**
     * @var \Shipment
     *
     * @ORM\ManyToOne(targetEntity="Shipment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shipment_id", referencedColumnName="id")
     * })
     */
    private $shipment;

    /**
     * @var \StatusCatalog
     *
     * @ORM\ManyToOne(targetEntity="StatusCatalog")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status_catalog_id", referencedColumnName="id")
     * })
     */
    private $statusCatalog;


}
