<?php

namespace DependencyInversionPrinciple;

class ApplePay implements PaymentMethodInterface
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $identifier;

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
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
        return $this->getIdentifier();
    }
}