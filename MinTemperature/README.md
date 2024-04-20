Min Temperature
===

#array #array_filter

This script is an implementation of a simple coding challenge.

## 📑 Overview

This script finds the minimum temperature from a given set of temperatures.

## 📚 Implementation Details

A class named `MinTemperature` that contains two methods to find minimum temperatures from an `array` of integers.

1. **getClosestToZero**

The `getClosestToZero` method aims to find the temperature value closest to zero from a given array of temperatures.
It takes an array of integers as input.
It returns a single integer representing the temperature closest to zero.

The logic first checks if the input array is empty and throws an exception if so.
Then it handles the simple case of only one temperature being passed.
Otherwise, it initializes a minimum variable to the first array value.
It loops through the other values, comparing the absolute value to the current minimum.
If lower, it updates minimum to that value.
It also handles the case where two values have the same absolute value, choosing the positive one if available.
After the loop, minimum will hold the value closest to zero to return.

2. **getMinimumPositiveTemperature**

The `getMinimumPositiveTemperature` method finds the lowest positive temperature value from a given array.
It takes an array of integers as input.
It returns a single integer representing the minimum positive temperature.

It first checks for an empty array and throws an exception if found.
Then it filters the array to only positive values, throwing an exception if none are found.
It uses the built-in min function to find the lowest value in the filtered array and returns it.

## ⏳ TLDR;

So in summary, this class provides two methods for finding minimum temperature values from an array based on specific criteria.
It handles invalid inputs and edge cases appropriately.
The logic uses common algorithms like looping, filtering, and the min function to achieve the goals.
