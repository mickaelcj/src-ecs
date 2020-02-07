<?php

namespace Admin\Entity;

use Core\Entity\IdTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * ProductType
 *
 * @ORM\Table(name="product_category")
 * @ORM\Entity
 */
class ProductCategory
{
    use IdTrait;
    
    /**
     * @var string
     *
     * @ORM\Column(name="category_name", type="string", length=64, nullable=false)
     */
    private $categoryName;
    
    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(string $categoryName): self
    {
        $this->categoryName = $categoryName;

        return $this;
    }


}
