# Dependency Inversion Principle

In this step we needed to add support for different payment methods, different payment gateways, and the ability to charge for different things, other than the basket. But our classes depended on concrete classes for `Basket`, `Gateway` and `CreditCard`.

This violates the Dependency Inversion Principle which states that:

1. High level modules should not depend on low level modules, both should depend on abstractions.
1. Abstractions should not depend upon details. Details should depend upon abstractions.

Our high level modules, such as the `Checkout` class, depend on low level modules, i.e. the aforementioned classes, `Basket`, `Gateway` and `CreditCard`. I.e. exactly what we're not supposed to do, and this is what's causing us a problem in implementing the new features.

So in this step, we've introduced 3 new interfaces:

1. `ChargeableInterface` implemented by `Basket`
1. `GatewayInterface` implemented by `Gateway` and `Gateway2`
1. `PaymentMethodInterface` implemented by `CreditCard` and `ApplePay`

... and refactored our high level modules (`Checkout`) to depend on these high level abstractions.

We've also ensured that our `GatewayInterface` abstraction depends on other abstractions (`ChargeableInterface` and `PaymentMethodInterface`) as opposed to <i>details</i>.

## Conclusion

Although there are a lot more classes in this step, that is because this step is a lot more full featured than where we started.

Peeling back the layers, all we've got extra are a few Interfaces and an Event, and we've split the original `Shop` class into `Basket` and `Checkout` classes, yet we have a maintainable, understandable, extendable and robust codebase.

