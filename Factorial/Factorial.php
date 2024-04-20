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

namespace App\Factorial;

/**
 * Factorial
 *
 * In mathematics, the factorial of a non-negative integer is the product of all positive integers less than or equal to that integer.
 */
final class Factorial
{
    public function factorial(int $number): int
    {
        if ($number < 0) {
            throw new \InvalidArgumentException(sprintf('%s expects parameter 1 to be a positive integer: "%s" given', __METHOD__, $number));
        }

        if ($number === 0) {
            return 1;
        }

        return $number * $this->factorial($number - 1);
    }
}
