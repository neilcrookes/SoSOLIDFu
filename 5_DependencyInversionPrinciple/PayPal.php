<?php

namespace DependencyInversionPrinciple;

class PayPal implements PaymentMethodInterface
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $account;

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
        return $this->getAccount();
    }
}