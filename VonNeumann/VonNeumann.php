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

namespace App\VonNeumann;

/**
 *  Von Neumann's method, also called the middle-square method, generates pseudorandom numbers by squaring a seed value and
 *  extracting the middle digits as the next number. This process repeats using the generated number as the new seed. While
 *  simple, it has limitations like potential patterns and periodicity.
 */
final class VonNeumann
{
    public function pseudoRandom(int $seed): int
    {
        if ($seed < 1) {
            throw new \InvalidArgumentException(sprintf('%s expects parameter 1 to be greater or equal to 1: "%s" given', __METHOD__, $seed));
        }

        $squared = strval($seed ** 2);
        $middleDigits = substr($squared, (int) floor(strlen($squared) / 2) - 2, 4);

        return intval($middleDigits);
    }
}
