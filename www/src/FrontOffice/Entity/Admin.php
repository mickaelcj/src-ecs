<?php

namespace FrontOffice\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_880E0D76E7927C74", columns={"email"})})
 * @ORM\Entity
 */
class Admin
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
     * @var array
     *
     * @ORM\Column(name="roles", type="array", length=0, nullable=false)
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password_hash", type="string", length=128, nullable=false)
     */
    private $passwordHash;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_login_at", type="datetime", nullable=true)
     */
    private $lastLoginAt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_login_ip", type="string", length=32, nullable=true)
     */
    private $lastLoginIp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_user_agent", type="string", length=255, nullable=true)
     */
    private $lastUserAgent;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false)
     */
    private $isDeleted;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;


}
