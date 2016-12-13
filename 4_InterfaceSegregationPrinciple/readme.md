# Interface Segregation Principle

In this step we needed to add support for Digital Products to our store, i.e. sub types of Product, that have a specific url to download, but we don't keep track of their stock level, like we do physical products.

The obvious solution was to extend the <a href="../3_LiskovSubstitutionPrinciple/Product.php">`Product`</a> class we had earlier, but then we realised that implemented the <a href="../3_LiskovSubstitutionPrinciple/PurchasableInterface.php">`PurchasableInterface`</a> which included the <a href="../3_LiskovSubstitutionPrinciple/PurchasableInterface.php#L20">`getStock()`</a> and <a href="../3_LiskovSubstitutionPrinciple/PurchasableInterface.php#L26">`setStock()`</a> methods - which are obviously irrelevant to digital products.

You could say that our <a href="../3_LiskovSubstitutionPrinciple/PurchasableInterface.php">`PurchasableInterface`</a> violated the Single Responsibility Principle!

So in this step, we did what we should have done in the first place and split the stock management related methods out of our <a href="PurchasableInterface.php">`PurchasableInterface`</a> and into their own <a href="StockableInterface.php">`StockableInterface`</a>.

Furthermore, we introduced an <a href="AbstractProduct.php">`AbstractProduct`</a> class that our new <a href="PhysicalProduct.php">`PhysicalProduct`</a> and <a href="DigitalProduct.php">`DigitalProduct`</a> classes inherit from, and ensured that whilst both implement the <a href="PurchasableInterface.php">`PurchasableInterface`</a>, only the <a href="PhysicalProduct.php">`PhysicalProduct`</a> implements the <a href="StockableInterface.php">`StockableInterface`</a>.

Finally, we've updated the <a href="DecrementStockListener.php#L23">`DecrementStockListener`</a> to only update the stock for products that implement `StockableInterface`.

## Next requirement

There are plenty more possible future requirements, some of which could include:

1. Use a different gateway
1. Accept other payment methods
1. Support charging for other things, not just <a href="Basket.php">`Basket`</a>, e.g. Subscription products, amended orders etc
 
Unfortunately, most of the code we have so far is tightly coupled to our <a href="Basket.php">`Basket`</a>, <a href="Gateway.php">`Gateway`</a> and <a href="CreditCard.php">`CreditCard`</a> classes, so to support any of these new requirements we'll need to make lots of changes to our tested, released code.
 
Check out the last step on the <a href="../5_DependencyInversionPrinciple/readme.md">Dependency Inversion Principle</a> to see how we could have avoided this PITA. 