<?php

namespace DependencyInversionPrinciple;

class Gateway implements GatewayInterface
{
    /**
     * E.g. Guzzle or some other http client
     *
     * @var
     */
    private $client;

    /**
     * @param ChargeableInterface $chargeable
     * @param PaymentMethodInterface $paymentMethod
     * @return string
     * @throws GatewayException
     */
    public function charge(ChargeableInterface $chargeable, PaymentMethodInterface $paymentMethod)
    {
        $result = $this->client->post('/purchase', [
            'amount' => $chargeable->getChargeableAmount(),
            'token' => $paymentMethod->getToken(),
        ]);

        if ($result->isSuccess())
        {
            return $result->getReference();
        }

        throw new GatewayException($result->getErrorMessage());
    }
}