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

namespace App\PrimeNumbers;

/**
 * PrimeNumbers
 *
 * A prime number is a natural number greater than 1 that has no positive divisors other than 1 and itself. Examples include 2, 3, 5, and 7.
 */
final class PrimeNumbers
{
    public function isPrime(int $number): bool
    {
        if ($number < 1) {
            throw new \InvalidArgumentException(sprintf('%s expects parameter 1 to be greater or equal to 1: "%s" given', __METHOD__, $number));
        }

        for ($i = 2; $i <= sqrt($number); ++$i) {
            if ($number % $i === 0) {
                return false;
            }
        }

        return $number > 1;
    }
}
