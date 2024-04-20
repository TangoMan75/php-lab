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

namespace App\Perfect;

/**
 * A perfect number is a positive integer that is equal to the sum of its proper divisors,
 * which are the positive integers that divide the number without leaving a remainder
 * and are less than the number itself.
 */
final class Perfect
{
    /**
     * Check if a number is perfect
     *
     * @param int $number The number to check
     *
     * @return bool True if the number is perfect, false otherwise
     */
    public function isPerfect(int $number): bool
    {
        if ($number < 0) {
            throw new \InvalidArgumentException(sprintf('%s expects parameter 1 to be a positive integer: "%s" given', __METHOD__, $number));
        }

        // Find the sum of the proper divisors of number
        $divisorSum = 0;
        for ($i = 1; $i < $number; ++$i) {
            if ($number % $i == 0) {
                $divisorSum += $i;
            }
        }

        // Check if the sum of the proper divisors is equal to number
        return $divisorSum == $number;
    }
}
