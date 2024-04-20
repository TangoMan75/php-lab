SumEvenNumbers
===

#algorithm #array #sum

This script is an implementation of a simple coding challenge.

## 📑 Overview

Create method to sum even numbers in an array.

This class provides two methods to calculate the sum of even numbers in an array of integers.

## 📚 Implementation Details

* `SumEvenNumbers(array $numbers): int` - This method iterates over the provided array and adds each even number to a running total.
It returns the final sum as an integer.

* `SumEvenNumbersAlt(array $numbers): int` - This method utilizes the `array_reduce` function to achieve the same functionality as the first method in a more concise way.
It filters even numbers and adds them to the accumulator.

## 🇴 Time Complexity

Since the dominant factor is the loop iterating `n` times, the overall time complexity of the function is `O(n)`.

