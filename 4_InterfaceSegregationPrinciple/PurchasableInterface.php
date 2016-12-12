<?php

namespace InterfaceSegregationPrinciple;

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
     * @return string
     */
    public function getBasketTitle();
}