<?php

namespace DependencyInversionPrinciple;

interface ChargeableInterface
{
    /**
     * @return float
     */
    public function getChargeableAmount();
}