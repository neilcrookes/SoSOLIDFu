<?php

namespace DependencyInversionPrinciple;

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
            $product = $item['product'];
            if (!$product instanceof StockableInterface)
            {
                continue;
            }
            $quantity = $item['quantity'];
            $product->setStock($product->getStock() - $quantity);
        }
    }
}