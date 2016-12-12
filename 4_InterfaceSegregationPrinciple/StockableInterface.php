<?php

namespace InterfaceSegregationPrinciple;

interface StockableInterface
{
    /**
     * @return int
     */
    public function getStock();

    /**
     * @param int $stock
     * @return void
     */
    public function setStock($stock);
}