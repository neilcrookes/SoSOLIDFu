<?php

namespace DependencyInversionPrinciple;

class PhysicalProduct extends AbstractProduct implements PurchasableInterface, StockableInterface
{
    /**
     * @var int
     */
    protected $stock;

    /**
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }
}