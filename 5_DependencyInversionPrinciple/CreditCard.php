<?php

namespace DependencyInversionPrinciple;

class CreditCard implements PaymentMethodInterface
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $last4;

    /**
     * @var int
     */
    private $expiryMonth;

    /**
     * @var int
     */
    private $expiryYear;

    /**
     * @return int
     */
    public function getExpiryYear()
    {
        return $this->expiryYear;
    }

    /**
     * @return int
     */
    public function getExpiryMonth()
    {
        return $this->expiryMonth;
    }

    /**
     * @return string
     */
    public function getLast4()
    {
        return $this->last4;
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
        return 'xxxx xxxx xxxx ' . $this->getLast4() . ' Ex: ' . $this->getExpiryMonth() . '/' . $this->getExpiryYear();
    }
}