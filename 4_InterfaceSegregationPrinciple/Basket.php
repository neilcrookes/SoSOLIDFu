<?php

namespace InterfaceSegregationPrinciple;

class Basket
{
    /**
     * @var array
     */
    private $products = [];

    /**
     * @var float
     */
    private $total = 0;

    /**
     * @param PurchasableInterface $product
     */
    public function add(PurchasableInterface $product)
    {
        if (array_key_exists($product->getId(), $this->products))
        {
            $this->products[$product->getId()]['quantity']++;
        }
        else
        {
            $this->products[$product->getId()] = [
                'product' => $product,
                'quantity' => 1
            ];
        }
        $this->total += $product->getPrice();
    }

    /**
     * @param PurchasableInterface $product
     */
    public function remove(PurchasableInterface $product)
    {
        if (!array_key_exists($product->getId(), $this->products))
        {
            return;
        }
        $this->products[$product->getId()]['quantity']--;
        if ($this->products[$product->getId()]['quantity'] <= 0)
        {
            unset($this->products[$product->getId()]);
        }
        $this->total -= $product->getPrice();
    }

    /**
     * @return PurchasableInterface[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }
}