<?php

namespace DependencyInversionPrinciple;

final class Checkout
{
    /**
     * @var GatewayInterface
     */
    private $gateway;

    /**
     * @param ChargeableInterface $basket
     * @param PaymentMethodInterface $paymentMethod
     * @return bool
     */
    public function checkout(ChargeableInterface $basket, PaymentMethodInterface $paymentMethod)
    {
        try
        {
            $reference = $this->gateway->charge($basket, $paymentMethod);

            $this->sendOrderConfirmationEmail($basket, $paymentMethod);

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
     * @param PaymentMethodInterface $paymentMethod
     */
    public function sendOrderConfirmationEmail(Basket $basket, PaymentMethodInterface $paymentMethod)
    {
        $message = "Thank you for your order.\n";
        foreach ($basket as $item)
        {
            /** @var PurchasableInterface $product */
            $product = $item['product'];
            $message .= "\n" . $product->getBasketTitle() . ' x ' . $item['quantity'] . ' @ £' . $product->getPrice();
        }
        $message .= "\n\nPayment has been taken from: " . $paymentMethod->getDetails();
        mail('customer@domain.com', 'Your order at my store', $message);
    }
}