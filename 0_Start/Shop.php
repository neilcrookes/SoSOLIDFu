<?php

namespace Start;

class Shop
{
    /**
     * @var array
     */
    private $basket = [];

    /**
     * @var float
     */
    private $total = 0;

    /**
     * @var Gateway
     */
    private $gateway;

    /**
     * @param Product $product
     */
    public function addToBasket(Product $product)
    {
        if (array_key_exists($product->getId(), $this->basket))
        {
            $this->basket[$product->getId()]['quantity']++;
        }
        else
        {
            $this->basket[$product->getId()] = [
                'product' => $product,
                'quantity' => 1
            ];
        }
        $this->total += $product->getPrice();
    }

    /**
     * @param Product $product
     */
    public function removeFromBasket(Product $product)
    {
        if (!array_key_exists($product->getId(), $this->basket))
        {
            return;
        }
        $this->basket[$product->getId()]['quantity']--;
        if ($this->basket[$product->getId()]['quantity'] <= 0)
        {
            unset($this->basket[$product->getId()]);
        }
        $this->total -= $product->getPrice();
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return array
     */
    public function getBasket()
    {
        return $this->basket;
    }

    /**
     * @param CreditCard $card
     * @return bool
     */
    public function checkout(CreditCard $card)
    {
        try
        {
            $reference = $this->gateway->purchase($this, $card);

            $this->sendOrderConfirmationEmail($card);

            return true;
        }
        catch (GatewayException $e)
        {
            return false;
        }
    }

    /**
     * @param CreditCard $card
     */
    public function sendOrderConfirmationEmail(CreditCard $card)
    {
        $message = "Thank you for your order.\n";
        foreach ($this->basket as $item)
        {
            /** @var Product $product */
            $product = $item['product'];
            $message .= "\n" . $product->getName() . ' x ' . $item['quantity'] . ' @ £' . $product->getPrice();
        }
        $message .= "\n\nPayment has been taken from: xxxx xxxx xxxx " . $card->getLast4() . ' Ex: ' . $card->getExpiryMonth() . '/' . $card->getExpiryYear();
        mail('customer@domain.com', 'Your order at my store', $message);
    }

}