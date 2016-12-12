<?php

namespace Start;

class Gateway
{
    /**
     * E.g. Guzzle or some other http client
     *
     * @var
     */
    private $client;

    /**
     * @param Shop $shop
     * @param CreditCard $card
     * @return string
     * @throws GatewayException
     */
    public function purchase(Shop $shop, CreditCard $card)
    {
        $result = $this->client->post('/purchase', [
            'amount' => $shop->getTotal(),
            'token' => $card->getToken(),
        ]);

        if ($result->isSuccess())
        {
            return $result->getReference();
        }

        throw new GatewayException($result->getErrorMessage());
    }
}