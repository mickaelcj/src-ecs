<?php

namespace FrontOffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="stock")
 * @ORM\Entity
 */
class Stock
{
    /**
     * @var string
     *
     * @ORM\Column(name="in_stock", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $inStock;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_update_time", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $lastUpdateTime = 'CURRENT_TIMESTAMP';

    /**
     * @var \Product
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;


}
