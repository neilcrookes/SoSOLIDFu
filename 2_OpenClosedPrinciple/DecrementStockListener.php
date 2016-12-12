<?php

namespace OpenClosedPrinciple;

class DecrementStockListener
{
    /**
     * @param CheckoutEvent $event
     */
    public function handle(CheckoutEvent $event)
    {
        $this->decrementStocks($event->getBasket());
    }

    /**
     * @param Basket $basket
     */
    public function decrementStocks(Basket $basket)
    {
        foreach ($basket->getProducts() as $item)
        {
            /** @var Product $product */
            $product = $item['product'];
            $quantity = $item['quantity'];
            $product->setStock($product->getStock() - $quantity);
        }
    }
}