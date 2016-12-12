<?php

namespace DependencyInversionPrinciple;

class ProductVariant extends PhysicalProduct
{
    /**
     * @var string
     */
    private $size;

    /**
     * @var string
     */
    private $colour;

    /**
     * @return string
     */
    public function getBasketTitle()
    {
        return sprintf('%s (Size: %s | Colour: %s', $this->getName(), $this->getSize(), $this->getColour());
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getColour()
    {
        return $this->colour;
    }
}