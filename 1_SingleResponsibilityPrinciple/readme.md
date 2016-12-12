# Single Responsibility Principle

The Single Responsibility Principle states that a class should have only one reason to change.

Therefore it should only perform one function.

The purpose of the principle is to minimise changes to tested, released code, and to make your classes simpler, easier to understand and more maintainable. It also encourages decoupling to some extent.

The `Shop` class that we've started with performs both basket functionality, and checkout functionality.
 
Some reasonable changes to our requirements could include:

1. Add or remove multiple quantities of a product at a time
1. Change the Order Confirmation Email

The first change in the list above applies only to the basket functionality, whilst the other applies only to the checkout functionality.

This violates the Single Responsibility Principle as changes to the basket functionality requires editing the same class that handles the checkout functionality, which is more likely to introduce bugs.

The jobs of managing the basket, and handling the checkout are different, so they should each have their own class.

In this step, we've split the functionality from the old `Shop` class into 2 separate `Basket` and `Checkout` classes.

Now, if the requirements for managing the basket changes, we just need to change the Basket class.

The risk of introducing a bug into the code that handles checkout, is reduced. 

Similarly, for changes in requirements to the checkout, i.e. it's unlikely we'll introduce a bug in the code that handles the basket.

## Next step

What if there is a new requirement to support decrementing the stock counts of the products in the basket, when they're checked out?

Currently we can't achieve this easily, without modifying our existing code. Our code does not make it very easy for our future selves, or a colleague to add this functionality, without making changes, which could introduce a bug in our tested, release code.

Sure we could extend the `Checkout` class and override the `checkout()` method, calling `parent::checkout()` and if the result is true, then decrement the stock levels of each Product in the Basket. But what if we need to add another new feature in the future, should we extend again? And again? Where will it end?

Alternatively, let's assume we have an MVC framework, and the `Checkout::checkout()` method is called in a controller action, we could edit the controller action and add this functionality if the result is true. But that involves edit tested, released code, which again could introduce a bug, and has the danger of making our controller actions really long. And what if we have multiple controller actions for the checkout, e.g. one for credit card payments, one for paypal payments etc., we'd have to add this code in all those controller actions, which violates the Don't Repeat Yourself principle.

So, how to solve? Check out step 2 for a suggestion.