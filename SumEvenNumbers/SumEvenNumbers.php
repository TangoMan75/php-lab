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

namespace App\SumEvenNumbers;

/**
 * SumEvenNumbers
 */
final class SumEvenNumbers
{
    public function SumEvenNumbers(array $numbers): int
    {
        if (!array_filter($numbers, 'is_int')) {
            throw new \TypeError(sprintf('%s expects array to contain integers only', __METHOD__));
        }

        $result = 0;
        foreach ($numbers as $number) {
            if ($number % 2 === 0) {
                $result += $number;
            }
        }

        return $result;
    }

    public function SumEvenNumbersAlt(array $numbers): int
    {
        if (!array_filter($numbers, 'is_int')) {
            throw new \TypeError(sprintf('%s expects array to contain integers only', __METHOD__));
        }

        return array_reduce($numbers, function ($carry, $number) {
            return $number % 2 === 0 ? $carry + $number : $carry;
        }, 0);
    }
}
