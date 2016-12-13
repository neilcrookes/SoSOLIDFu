# Dependency Inversion Principle

In this step we needed to add support for different payment methods, different payment gateways, and the ability to charge for different things, other than the basket. But our classes depended on concrete classes for <a href="../4_InterfaceSegregationPrinciple/Basket.php">`Basket`</a>, <a href="../4_InterfaceSegregationPrinciple/Gateway.php">`Gateway`</a> and <a href="../4_InterfaceSegregationPrinciple/CreditCard.php">`CreditCard`</a>.

This violates the Dependency Inversion Principle which states that:

1. High level modules should not depend on low level modules, both should depend on abstractions.
1. Abstractions should not depend upon details. Details should depend upon abstractions.

Our high level modules, such as the <a href="../4_InterfaceSegregationPrinciple/Checkout.php">`Checkout`</a> class, depend on low level modules, i.e. the aforementioned classes, `Basket`, `Gateway` and `CreditCard`. I.e. exactly what we're not supposed to do, and this is what's causing us a problem in implementing the new features.

So in this step, we've introduced 3 new interfaces:

1. <a href="ChargeableInterface.php">`ChargeableInterface`</a> implemented by <a href="Basket.php#L5">`Basket`</a>
1. <a href="GatewayInterface.php">`GatewayInterface`</a> implemented by <a href="Gateway.php#L5">`Gateway`</a> and <a href="Gateway2.php#L5">`Gateway2`</a>
1. <a href="PaymentMethodInterface.php">`PaymentMethodInterface`</a> implemented by <a href="CreditCard.php#L5">`CreditCard`</a> and <a href="ApplePay.php#L5">`ApplePay`</a>

... and refactored our high level modules (<a href="Checkout.php">`Checkout`</a>) to depend on these high level abstractions.

We've also ensured that our <a href="GatewayInterface.php">`GatewayInterface`</a> abstraction depends on other abstractions (<a href="ChargeableInterface.php">`ChargeableInterface`</a> and <a href="PaymentMethodInterface.php">`PaymentMethodInterface`</a>) as opposed to <i>details</i>.

## Conclusion

Although there are a lot more classes in this step, that is because this step is a lot more full featured than where we started. Our web shop now supports:

* Product Variants
* Digital Products
* Decrementing stock after checkout for physical products
* Multiple payment gateways
* Multiple payment methods

Peeling back the layers, and ignoring these new features, all we've done is added a few Interfaces and an Event, and we've split the original `Shop` class into `Basket` and `Checkout` classes, yet we have a maintainable, understandable, extendable and robust codebase.

And had we done this in the first place, we could have added all these new features, without modifying a single piece of our original code. This is how the SOLID principles help you "Design Better Code"!