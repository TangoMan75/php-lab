Stocks
===

#array

This script is an implementation of a simple coding challenge.

## 📑 Overview

Return an array holding the names of the top three stocks with the best average performance given two separate arrays containing stocks names and prices.

Example:
```php
<?php
	$stocks = ['StockA', 'StockB', 'StockC'];
	$prices = [
	    [10, 20, 30],
	    [5, 15, 25],
	    [8, 18, 28]
	];
```

In this example the average performance of _StockA_ is _(10 + 20 + 30) / 3 = 20_, _StockB_ is _(5 + 15 + 25) / 3 = 15_, _StockC_ is _(8 + 18 + 28) / 3 = 18. 66_...

The top three stocks based on average performance are `['StockA', 'StockC', 'StockB']`.

## 📚 Implementation Details

The `Stocks` class finds the top 3 best average performing stocks from two input arrays.

It takes in two arrays - one containing stock names, and another containing arrays of stock prices for each stock. It assumes these two arrays have the same length.

The purpose is to calculate the average price of each stock, sort the stocks by their average price from highest to lowest, and return the top _3_ stock names based on the highest averages.

It first validates that there are at least _3_ stocks provided, and that the stocks array and prices array have equal length.

Then it loops through each stock and calculates the average price by summing the prices array for that stock and dividing by the number of elements.

It stores these average prices in a new array, with the stock name as the key and average as the value.

It sorts this array in reverse order by value, putting highest averages first.

Finally, it returns the first _3_ keys from this sorted array, which will be the _3_ stock names with the highest average prices.

## ⏳ TLDR;

So in summary, it takes two related arrays as input, calculates a derived value (average) for each stock, sorts the stocks by that value, and returns the top _3_ stock names based on that sorting.
The main logic flows are the initial validation, the average price calculation loop, the sorting, and taking the first 3 elements.
