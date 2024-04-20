<?php

declare(strict_types=1);

/*
 * This file is part of the TangoMan PHP Lab package.
 *
 * (c) "Matthias Morin" <mat@tangoman.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Stocks;

/**
 * Stocks
 *
 * Return an array holding the names of the top three stocks with the best average performance given two separate arrays containing stocks names and prices.
 *
 * Example:
 * $stocks = ["StockA", "StockB", "StockC"];
 * $prices = [
 *     [10, 20, 30],
 *     [5, 15, 25],
 *     [8, 18, 28]
 * ];
 *
 * The average performance of StockA is (10 + 20 + 30) / 3 = 20,
 * StockB is (5 + 15 + 25) / 3 = 15,
 * StockC is (8 + 18 + 28) / 3 = 18. 66...
 *
 * The top three stocks based on average performance are ["StockA", "StockC", "StockB"].
 */
final class Stocks
{
    /**
     * Technical test: Return top three best average performing stocks from two lists.
     */
    public function getTopThree(array $stocks, array $prices): array
    {
        if (count($stocks) != count($prices)) {
            throw new \InvalidArgumentException(__METHOD__.' expects both arrays to have same length');
        }

        if (count($stocks) < 3) {
            throw new \InvalidArgumentException(__METHOD__.' expects arrays to contain at least three items');
        }

        $result = [];

        // storing average stock performance in array as "stock_name => average"
        foreach ($stocks as $i => $stock) {
            $result[$stock] = array_sum($prices[$i]) / count($prices[$i]);
        }
        arsort($result);

        return array_keys(array_slice($result, 0, 3));
    }
}
