# Open Closed Principle

The new requirement in this step was to decrement the stock count of each product purchased.

We could have extended the <a href="../1_SingleResponsibilityPrinciple/Checkout.php">`Checkout`</a> class from the step 1, but that's not ideal - how many times should we extend a class to add new features? 

Instead in this step, we've introduced the <a href="CheckoutEvent.php">`CheckoutEvent`</a> and subsequently the <a href="DecrementStockListener.php">`DecrementStockListener`</a> classes.

We've also had to modify the `Checkout` class to <a href="Checkout.php#L25">`fire()`</a> the <a href="CheckoutEvent.php">`CheckoutEvent`</a>.

Had we fire()'d the event in the first place, we would have been able to add the feature to decrement the stock levels of products upon checkout, without modifying any code, only adding some.

All modern frameworks provide easy support for events and listeners, so there's no excuse not to use them.
 
We've also made the `Checkout` class <a href="Checkout.php#L5">`final`</a>! Holy shit, how arrogant are we? But we've made our checkout functionality open for extension, whilst also making it closed for modification.
 
This is controversial with some developers, but consider the implication that someone else extended the <a href="Checkout.php">`Checkout`</a> class, and overrode the <a href="Checkout.php#L39">`sendOrderConfirmationEmail()`</a> method (imagine you'd made it protected instead of private) to do something else with it, like say, for example change the text of the email. But you didn't know this, so you'd changed the method prototype in your `Checkout` class to accept the subject, or the customer email for example. When you deployed this code, you'd break their code!
 
Making a class final, or using private members reduces the risk of introducing breaking changes, when you refactor it.

## New requirement

Let's say you want to start selling product variants, i.e. the same products can come in a variety of sizes, or colours for example, as well as your standard products.
 
In our simple example, each new variant could be it's own product, but in a real store, you will probably want to have them separate but related entities. In the database, for example, a Product would have many Variants. The product would be the entity the name and description is attached to, and the Variant would be the entity that different sizes or colours are attached to. Each have their own ID, prices and stock levels.

So how about if we made a new class `ProductVariant` and made it extend <a href="Product.php">`Product`</a>, and then we could still add it to our existing <a href="Basket.php">`Basket`</a> and our existing <a href="DecrementStockListener.php">`DecrementStockListener`</a> would still work, right?
 
... But what about the <a href="Checkout.php#L39">`Checkout::sendOrderConfirmationEmail()`</a> method - this explicitly calls the <a href="Product.php#L43">`Product::getName()`</a> method! We now need it to display the details of the Variant if that's what was ordered, for example the size or colour.

So our application cannot support swapping out a parent class for a sub type. It violates the Liskov Substitution Principle

Check out <a href="../LiskovSubstitutionPrinciple">step 3</a> to see what we could have done in the first place that would have allowed us to add support for Product Variants as a subclass of <a href="Product.php">`Product`</a> without having to modify any tested, released code. 