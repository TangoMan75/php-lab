Tower of Hanoi
===

#advanced #algorithm #recursion

This is an implementation of the _Tower of Hanoi_ puzzle game.

## 📑 Overview

The _Tower of Hanoi_ game consists of three rods and a number of disks of different sizes which can slide onto any rod.
The puzzle starts with the disks stacked in ascending order of size on one rod, the smallest disk at the top.

The objective of the game is to move the entire stack to the last rod, obeying the following rules:

- Only one disk may be moved at a time.
- Each move consists of taking the upper disk from one of the rods and sliding it onto another rod, on top of the other disks that may already be present on that rod.
- No disk may be placed on top of a smaller disk.

## 📚 Implementation Details

The purpose of the `towerOfHanoi` method is to calculate the list of steps needed to solve the _Tower of Hanoi_ puzzle for a given number of disks.

It takes in three inputs:

1. `numDisks`  - the number of disks to solve for
2. `startPole` - the starting rod
3. `endPole`   - the ending rod
4. `sparePole` - the spare rod used for moving disks

It returns an `array` containing the list of steps, where each step is represented by an `array` with the disk number being moved and the start and end rods for that move.

The method first does validation on the inputs to ensure `numDisks` is positive and the rod names are valid _"A"_, _"B"_ or _"C"_.

It then handles the base cases:

- If `numDisks` is _1_, it simply returns an `array` with one step to move the disk from `startPole` to `endPole`.
- If `numDisks` is _0_, it `throws` an exception.

For `numDisks` greater than _1_, it uses recursion to build the solution.
It recursively calls `towerOfHanoi` to solve the puzzle for `numDisks -1` disks using the spare pole.
It prepends the steps for moving the remaining largest disk from `startPole` to `endPole`.
It appends the recursive call steps to move the `numDisks -1` disks from the spare pole to the end pole.

This allows it to break down the larger puzzle into smaller sub-problems, while abiding by the rules of only moving one disk at a time and never placing a larger disk above a smaller one.

## ⏳ TLDR;

So in summary, it calculates the full sequence of legal moves needed to solve the _Tower of Hanoi_ for any number of disks through recursion.
