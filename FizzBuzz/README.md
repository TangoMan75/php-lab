FizzBuzz
===

#concatenation #integer #modulo #string #type #variable

This script is an implementation the classic FizzBuzz coding challenge.

## 📑 Overview

FizzBuzz is a group word game for children to teach them about division.
Players take turns counting incrementally, replacing any number divisible by _3_ with the word _"Fizz"_, any number divisible by _5_ with the word _"Buzz"_, and any number divisible by both _3_ and _5_ with the word _"FizzBuzz"_.

This script is inspired by the following Tom Scott video :
- [FizzBuzz: One Simple Interview Question](https://www.youtube.com/watch?v=QPZ0pIK_wsc)

## 📚 Implementation Details

The `fizzBuzz` method from the `FizzBuzz` `class` takes a positive `integer` as input and returns a `string` as output.

The purpose of this function is to return a `string` representation of the input number following these rules:

1. If the number is divisible by _3_, return `_"Fizz"_`.
2. If the number is divisible by _5_, return `_"Buzz"_`.
3. If the number is divisible by both _3_ and _5_, return `_"FizzBuzz"_`.
4. Otherwise, just return the number as a `string`.

For example, if the input is _9_, it will return _"Fizz"_ because _9_ is divisible by _3_.
If the input is _10_, it will return _"Buzz"_ because _10_ is divisible by _5_.
And if the input is _15_, it will return _"FizzBuzz"_ because _15_ is divisible by both _3_ and _5_.

The function first checks if the input number is lower than _1_ and throws an exception if so, since it expects a positive `integer`.

Then it initializes an empty `string` variable to build up the output.

It checks if the number is divisible by _3_ and/or _5_ using the modulo operator `%`.
If so, it appends _"Fizz"_ and/or _"Buzz"_ to the output `string` accordingly.

Finally, if no `string` was built up because the number was not divisible by _3_ or _5_, it just converts the number to a `string` and returns that.

## ⏳ TLDR;

In summary, this function takes a number, applies some logic to convert it to a special `string` according to some rules, and returns the result.

It showcases the use of modulo, string concatenation, and type conversion in a simple but clever algorithm.
