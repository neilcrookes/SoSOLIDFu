# Interface Segregation Principle

In this step we needed to add support for Digital Products to our store, i.e. sub types of Product, that have a specific url to download, but we don't keep track of their stock level, like we do physical products.

The obvious solution was to extends the `Product` class we had earlier, but then we realised that implemented the `PurchasableInterface` which included the `setStock()` and `getStock()` methods - which are obviously irrelevant to digital products.

You could say that our `PurchasableInterface` violated the Single Responsibility Principle!

So in this step, we did what we should have done in the first place and split the stock management related methods out of our `PurchasableInterface` and into their own `StockableInterface`.

Furthermore, we introduced an `AbstractProduct` class that our new `PhysicalProduct` and `DigitalProduct` classes inherit from, and ensured that whilst both implement the `PurchasableInterface`, only the `PhysicalProduct` implements the `StockableInterface`

Finally, we've updated the `DecrementStockListener` to only update the stock for products that implement `StockableInterface`.

## Next requirement

There are plenty more possible future requirements, some of which could include:

1. Use a different gateway
1. Accept other payment methods
1. Support charging for other things, not just `Basket`, e.g. Subscription products, amended orders etc
 
Unfortunately, most of the code we have so far is tightly coupled to our `Basket`, `Gateway` and `CreditCard` classes, so to support any of these new requirements we'll need to make lots of changes to our tested, released code.
 
Check out the last step to see how we could have avoided this PITA. 