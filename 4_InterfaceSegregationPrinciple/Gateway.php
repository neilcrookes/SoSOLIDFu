<?php

namespace InterfaceSegregationPrinciple;

class Gateway
{
    /**
     * E.g. Guzzle or some other http client
     *
     * @var
     */
    private $client;

    /**
     * @param Basket $basket
     * @param CreditCard $card
     * @return string
     * @throws GatewayException
     */
    public function purchase(Basket $basket, CreditCard $card)
    {
        $result = $this->client->post('/purchase', [
            'amount' => $basket->getTotal(),
            'token' => $card->getToken(),
        ]);

        if ($result->isSuccess())
        {
            return $result->getReference();
        }

        throw new GatewayException($result->getErrorMessage());
    }
}