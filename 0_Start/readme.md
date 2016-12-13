# Start

This is a simple example of a Shopping Cart application with Value Objects for <a href="Product.php">`Product`</a> and <a href="CreditCard.php">`CreditCard`</a>, a simple <a href="Gateway.php">`Gateway`</a> class to handle the payment processing, and a more complex <a href="Shop.php">`Shop`</a> class that handles the basket and checkout functionality.

These set of classes, whilst they meet the current requirements, and they look simple enough, don't consider the SOLID principles.

As a result, in a real-world eCommerce store, where the classes would be more complex, when requirements change, we'll need to update the classes, modifying existing tested and released code, which could introduce bugs.

Or when a new developer joins the project, they might be unsure how you originally intended new features be added, and they might make changes, that cause future requirements to be difficult to implement.

So, let's examine this codebase with consideration to the SOLID principles, one by one, and see how it can be improved.

## New requirement

Some reasonable changes to our requirements could include:

1. Add or remove multiple quantities of a product at a time
1. Change the Order Confirmation Email

Check out the <a href="../1_SingleResponsibilityPrinciple/readme.md">next step</a> to see how to tackle these new requirements in a good way.