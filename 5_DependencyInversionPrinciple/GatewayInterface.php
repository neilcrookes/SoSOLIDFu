<?php

namespace DependencyInversionPrinciple;

interface GatewayInterface
{
    /**
     * @param ChargeableInterface $chargeable
     * @param PaymentMethodInterface $paymentMethod
     * @return string
     */
    public function charge(ChargeableInterface $chargeable, PaymentMethodInterface $paymentMethod);
}