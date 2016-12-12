<?php

namespace OpenClosedPrinciple;

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
     * @param Product $product
     */
    public function add(Product $product)
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
     * @param Product $product
     */
    public function remove(Product $product)
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
     * @return Product[]
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