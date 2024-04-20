Palindrome
===

#recursion #string

This script is an implementation of the palindrome algorithm.

## 📑 Overview

A palindrome is a string that reads the same backwards as forwards, e.g. "racecar" or "tacocat".

## 📚 Implementation Details

The selected code is an implementation of a recursive palindrome checking function called `isPalindromeRecursive` in the `Palindrome` class.

`isPalindromeRecursive` takes a `string` input and returns a `boolean` output indicating if the input `string` is a palindrome or not.

The purpose of this method is to check if the input `string` is a palindrome by comparing the first and last characters of the `string`, and recursively calling itself on a substring that excludes the first and last characters until it reaches the base case of a 1 or 2 character string which is by definition a palindrome.

It first removes any non-alphabetic characters from the input `string` and converts it to lowercase to simplify the comparison. It then checks some base cases - if the `string` is empty or _1_ character long, it's vacuously a palindrome.

The core logic is the recursive check - if the first and last characters match, it recursively calls itself on the substring without those characters. By recursively slicing off the matching first and last chars, it will eventually reach the base case and return `true` if the string is a palindrome. If at any point the first and last chars don't match, it immediately returns `false`.

## ⏳ TLDR;

So in summary, `isPalindromeRecursive` takes a `string` input, processes it to simplify the comparison, and then uses recursion to check if the `string` is equal to its own reverse by comparing the first and last chars on each recursive call until reaching the base case, returning `true` if it is a palindrome or `false` if not.
