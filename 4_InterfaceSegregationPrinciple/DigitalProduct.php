<?php

namespace InterfaceSegregationPrinciple;

class DigitalProduct extends AbstractProduct implements PurchasableInterface
{
    private $url;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function getBasketTitle()
    {
        return sprintf('<a href="%s">Download %s now!</a>', $this->getUrl(), $this->getName());
    }
}