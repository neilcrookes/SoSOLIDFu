<?php

namespace DependencyInversionPrinciple;

interface GatewayInterface
{
    /**
     * @param ChargeableInterface $chargeable
     * @param PaymentMethodInterface $paymentMethod
     * @return string
     * @throws GatewayException
     */
    public function charge(ChargeableInterface $chargeable, PaymentMethodInterface $paymentMethod);
}