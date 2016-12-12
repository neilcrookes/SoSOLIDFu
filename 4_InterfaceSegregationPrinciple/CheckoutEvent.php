<?php

namespace InterfaceSegregationPrinciple;

class CheckoutEvent
{
    /**
     * @var Basket
     */
    private $basket;

    /**
     * @param Basket $basket
     */
    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    /**
     * @return Basket
     */
    public function getBasket()
    {
        return $this->basket;
    }
}