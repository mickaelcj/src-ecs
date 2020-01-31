<?php

namespace FrontOffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentType
 *
 * @ORM\Table(name="payment_type")
 * @ORM\Entity
 */
class PaymentType
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
     * @ORM\Column(name="type_name", type="string", length=64, nullable=false)
     */
    private $typeName;


}
