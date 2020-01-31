<?php

namespace FrontOffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatusCatalog
 *
 * @ORM\Table(name="status_catalog")
 * @ORM\Entity
 */
class StatusCatalog
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
     * @ORM\Column(name="status_name", type="string", length=255, nullable=false)
     */
    private $statusName;


}
