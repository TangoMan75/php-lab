Poker
===

#advanced

This script is an implementation of a Poker hand stregnth calculator.

## 📑 Overview

The `PokerHandStrengthCalculator` class is used to evaluate the strength of a poker hand.

## 📚 Implementation Details

The `evaluateHand` method takes as input an _array_ of community cards shared by all players, and an _array_ of hole cards belonging to a specific player.
Its purpose is to analyze those cards and determine the best possible poker hand for that player, along with a numeric rank indicating the strength of that hand.

It starts by combining the community cards and player cards into one _array_, sorting them, and then running a series of checks on the sorted cards to look for specific poker hands like _straights_, _flushes_ etc.
It stores the best hand found in the `hand` property and its numeric rank in `rank`.

The key logic flows are:

- 1. Check if the cards contain a _straight flush_, which is the strongest possible hand. If so, store it and return.
- 2. Check if the cards contain _four of a kind_. If so, store it and return.
- 3. Check if the cards contain a _full house_. If so, store it and return.
- 4. Check if the cards contain a _flush_. If so, store it and return.
- 5. Check if the cards contain a _straight_. If so, store it and return.
- 6. If none of the above hands are found, it will eventually assign a simple _high card_ hand based on the highest card.

## ⏳ TLDR;

This code essentially encapsulates a poker hand strength calculator with methods for evaluating and identifying different hand types. It's a useful tool for poker-related simulations or applications where understanding the strength of a hand is necessary.
