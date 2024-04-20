Factorial
===

#recursion

This script is an implementation of the factorial algorithm.

## 📑 Overview

In mathematics, the factorial of a non-negative `integer` is the product of all positive integers less than or equal to that `integer`.

## 📚 Implementation Details

The `Factorial` class implements a factorial function to calculate the factorial of a given number.
The factorial of a number _n_ is the product of all positive integers less than or equal to _n_.
For example, the factorial of 5 is 5 x 4 x 3 x 2 x 1 = 120.

The Factorial class has one `method` called `factorial` that takes an `integer` input parameter called `number`.
It will calculate and return the factorial of that number.

Inside the `factorial` method, it first checks if the input `number` is negative and throws an exception if so, since factorials are only defined for positive integers.

Next, it checks if the `number` is _0_, in which case it immediately returns _1_, since the factorial of _0_ is defined as _1_.

Otherwise, it recursively calls the `factorial` method, multiplying the `number` by the factorial of `number - 1`.
This recursion continues until `number` reaches _0_ or _1_.

## ⏳ TLDR;

So in summary, the `Factorial` class provides a way to calculate factorials by taking an `integer` input, validating it is positive, handling the base case of _0_ factorial, and recursively calling itself to build up the factorial value for any positive _integer_.
The output is an `integer` result representing the factorial calculation for the input.
