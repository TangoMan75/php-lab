Fibonacci
===

#recursion

This script is an implementation of the fibonacci algorithm.

## 📑 Overview

The Fibonacci sequence is a mathematical pattern where each number is the sum of the previous two numbers.
The first two numbers are defined as _1_, and each subsequent number is the sum of the previous two.

For example, the first 10 Fibonacci numbers are:

> 0, 1, 1, 2, 3, 5, 8, 13, 21, 34

## 📚 Implementation Details

This code takes an `integer` input representing the position in the Fibonacci sequence to generate.
For example, passing _5_ would generate the 5th number in the sequence.

It starts by validating that the input number is greater than _0_, otherwise it throws an exception.

Then it handles the base cases where the input is _1_ or _2_, returning _1_.

For all other inputs, it recursively calls the function, passing `number -1` and `number -2`.
This builds up the sequence by continually summing the previous two numbers.

The key steps are:

1. Validate input
2. Handle base cases of 1 and 2
3. Recursively call the function to generate the sequence
4. Return the sum of the two previous numbers

## ⏳ TLDR;

So in summary, this recursively implements the Fibonacci sequence, taking a number as input and outputting the Fibonacci number at that position in the sequence.
