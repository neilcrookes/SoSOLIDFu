<?php

namespace DependencyInversionPrinciple;

interface PaymentMethodInterface
{
    /**
     * @return string
     */
    public function getToken();

    /**
     * @return string
     */
    public function getDetails();
}