<?php

namespace LiskovSubstitutionPrinciple;

final class Checkout
{
    /**
     * @var Gateway
     */
    private $gateway;

    /**
     * @param Basket $basket
     * @param CreditCard $card
     * @return bool
     */
    public function checkout(Basket $basket, CreditCard $card)
    {
        try
        {
            $reference = $this->gateway->purchase($basket, $card);

            $this->sendOrderConfirmationEmail($basket, $card);

            fire(new CheckoutEvent($basket));

            return true;
        }
        catch (GatewayException $e)
        {
            return false;
        }
    }

    /**
     * @param Basket $basket
     * @param CreditCard $card
     */
    public function sendOrderConfirmationEmail(Basket $basket, CreditCard $card)
    {
        $message = "Thank you for your order.\n";
        foreach ($basket as $item)
        {
            /** @var PurchasableInterface $product */
            $product = $item['product'];
            $message .= "\n" . $product->getBasketTitle() . ' x ' . $item['quantity'] . ' @ £' . $product->getPrice();
        }
        $message .= "\n\nPayment has been taken from: xxxx xxxx xxxx " . $card->getLast4() . ' Ex: ' . $card->getExpiryMonth() . '/' . $card->getExpiryYear();
        mail('customer@domain.com', 'Your order at my store', $message);
    }
}