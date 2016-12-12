<?php

namespace LiskovSubstitutionPrinciple;

interface PurchasableInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return float
     */
    public function getPrice();

    /**
     * @return int
     */
    public function getStock();

    /**
     * @param int $stock
     * @return void
     */
    public function setStock($stock);

    /**
     * @return string
     */
    public function getBasketTitle();
}