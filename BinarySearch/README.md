BinarySearch
===

#algorithm #array #boolean

This script is an implementation of the binary search algorithm.

## 📑 Overview

A binary search algorithm is a search technique that finds the position of a target value within a sorted `array`.
It works by repeatedly dividing the search interval in half until the target is found.
The binary search pattern is commonly used to optimize search performance.

## 📚 Implementation Details

The `binarySearch` method takes in an `array`, a value to search for, a _start_ index, and an _end_ index.
If no _end_ index is provided, it will default to the last index of the `array`.

The `binarySearch` method recursively splits the `array` in half, checks if the middle element matches the search value, and then repeats the process on either the left or right half depending on if the search value is less than or greater than the middle element.

This divides the search space in half each iteration, allowing it to very quickly narrow in on the search value if it exists in the `array`.

The method returns `true` if the value is found, `false` when it's not.

It starts by checking if the _start_ index has surpassed the _end_ index, in which case `false` is returned since the value was not found.

Then it calculates the middle index, checks if the middle element matches the search value, and returns `true` if so.

If not, it recursively calls itself, passing either the left or right half of the `array` to repeat the search on.

This recursion continues until the value is found or the search space is exhausted, at which point `false` is returned.

## 🇴 Time Complexity

Overall this allows efficient searching in `O(log n)` time complexity for sorted arrays.

## ⏳ TLDR;

