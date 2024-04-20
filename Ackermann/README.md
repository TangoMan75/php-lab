Ackermann
===

#algorithm #recursion

The _Ackermann function_ is a classic example of a recursive function that grows very quickly in value, as does the size of its call tree.

This script was inspired by the following Computerfile video :
- [The Most Difficult Program to Compute? - Computerphile](https://www.youtube.com/watch?v=i7sm9dzFtEI)

## 📑 Overview

The _Ackermann function_ takes two positive `integer` inputs _m_ and _n_, and returns an `integer` output.

The base cases are:

- If _m_ is _0_, it returns _n + 1_
- If _n_ is _0_, it calls itself recursively with _m - 1_ and _1_
- For all other cases, it calls itself recursively **twice**:

It calls itself with _m - 1_ and the result of calling itself with _m_ and _n - 1_
So the _Ackermann function_ reduces both _m_ and _n_ in each recursive call until it reaches the base cases.
The result grows extremely quickly as _m_ and _n_ increase.

## 📚 Implementation Details

The code first validates that the inputs _m_ and _n_ are positive integers.
Then it checks for the base cases described above.
If neither base case is met, it makes the two recursive calls according to the algorithm.

## 🇴 Time Complexity

The time complexity of the _Ackermann function_ is extremely high : `O(mA(m,n))`.
Supposedly `ackermann(5, 0)` should take more than the actual age of the universe to compute.

## ⏳ TLDR;

To summarize, this is a recursive implementation of the classic _Ackermann function_.
It grows the output very quickly based on the two positive `integer` inputs.
The code demonstrates recursion and implements the specific Ackermann algorithm logic.
