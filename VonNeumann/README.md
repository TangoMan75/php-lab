Von Neumann
===

#random

This script is an implementation of the Von Neumann algorithm.

## 📑 Overview

_Von Neumann_'s method, also called the _middle-square_ method, generates pseudorandom numbers by squaring a seed value and extracting the middle digits as the next number.
This process repeats using the generated number as the new seed.
While simple, it has limitations like potential patterns and periodicity.

## 📚 Implementation Details

The `VonNeumann` `class` generates pseudo-random numbers using _Von Neumann_'s _middle-square_ method.

The purpose of this `VonNeumann` `class` is to take in a _seed_ number and use it to generate a pseudo-random number sequence.
It does this by continuously squaring the previous number and taking the middle digits as the next "random" number in the sequence.

This `class` has one public method called `pseudoRandom` that takes an `integer` seed as input.
It first validates that the seed is greater than or equal to _1_, throwing an exception if not.

It then squares the seed number and converts it to a string.
From this squared string, it takes the middle _4_ digits by getting the floor of half the string length as the start position and extracting _4_ characters.

Those _4_ middle digits are converted back to an integer and returned as the "random" number output.

The key logic is squaring the previous number to introduce randomness but also taking only the middle digits to reduce the growth of the number.
This repetitive process of squaring and truncating produces a pseudo-random sequence from the initial _seed_.

## ⏳ TLDR;

So in summary, this `VonNeumann` `class` takes a numeric _seed_ as input, runs it through a mathematical algorithm to generate a new pseudo-random number, and returns that number.
It produces a sequence of pseudo-random numbers based on an initial seed using the classic _middle-square_ method invented by John _Von Neumann_.
