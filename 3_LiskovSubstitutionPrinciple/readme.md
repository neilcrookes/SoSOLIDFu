# Liskov Substitution Principle

In this step we needed to add support for Product Variants to our store, i.e. sub types of Product, that have a specific size and colour.

Although it makes sense to subclass `Product` with a new `ProductVariant` class, because of the way we'd coded other parts of our application, we couldn't just do that. We had to modify our existing code too. I.e. we had violated Liskov Substition Principle.
 
Specifically, we added a new method to `Product` called `getBasketTitle()` and overrode it in `ProductVariant` to tag on the size and colour details, then updated our `Checkout::sendOrderConfirmationEmail()` method to call this method on the basket item object, instead of the `getName()` method.

In addition, we've introduced a `PurchasableInterface` that imposes a contract on objects to implement all the methods that it's <i>Clients</i> rely on, and updated the `Basket` methods type hints (and phpdoc block comments in other classes) to expect instances of it.

Had we "coded to an interface" and maybe thought about the basket title requirement being different from the name, we could have avoided having to change our tested, released code.

## Next requirement

Now let's say you want to sell digital products. No problem, let's extend `Product` again right? It has to have a name and price, it also needs a `$url` member, and we ought to provide a download link in the order confirmation email, but we can do something similar to the `ProductVariant` class there right? Yes!

... But you don't keep stock of digital products!

And we've just added a `getStock()` and `setStock()` methods to our `PurchasableInterface`! Bugger...

Our `Basket` class (a <i>Client</i>) now expects a `PurchasableInterface`, but it has no need of the `getStock()` and `setStock()` methods that that interface imposes.

Check out the next step on the Interface Segregation Principle to see how we could have made our lives easier.