Perfect
===

#boolean

This script is an implementation of the perfect number algorithm.

## 📑 Overview

A perfect number is a positive `integer` that is equal to the sum of its proper positive divisors.
The proper divisors of a number are all the positive integers less than the number that divide it evenly, with no remainder.

For example:

- _6_ is a perfect number because its proper divisors are _1_, _2_, _3_ and _1 + 2 + 3 = 6_
- _28_ is a perfect number because its proper divisors are _1_, _2_, _4_, _7_, _14_ and _1 + 2 + 4 + 7 + 14 = 28_

## 📚 Implementation Details

This code defines a class called `Perfect` which has a method to check if a number is a perfect number or not.

The `isPerfect` method takes an `integer` as input.
It first validates that the input is greater than or equal to _0_, otherwise it throws an exception.

It then calculates the sum of the proper divisors by iterating from _1_ up to the number itself.
For each potential divisor, it checks if the remainder of dividing the number by that divisor is _0_.
If so, that divisor is a proper divisor and gets added to the divisorSum variable.

Once it has iterated through all potential divisors, it compares the final `divisorSum` to the original number.
If they are equal, then the number is perfect and it returns `true`.
Otherwise it returns `false`.

## ⏳ TLDR;

So in summary, this `Perfect` class provides a simple way to validate if a number is a perfect number by calculating the sum of its proper divisors and comparing that sum to the original number.
The `isPerfect` method handles the logic and calculations needed to determine if a number meets the criteria to be considered a perfect number.
