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

namespace App\Ackermann;

/**
 * Ackermann
 *
 * The Ackermann function is a classic example of a recursive function that grows very quickly in value, as does the size of its call tree.
 * This script was inspired by the following Computerfile video :
 * - [The Most Difficult Program to Compute? - Computerphile](https://www.youtube.com/watch?v=i7sm9dzFtEI)
 */
final class Ackermann
{
    public function ackermann(int $m, int $n): int
    {
        if ($m < 0) {
            throw new \InvalidArgumentException(sprintf('%s expects parameter 1 to be a positive integer: "%s" given', __METHOD__, $m));
        }

        if ($n < 0) {
            throw new \InvalidArgumentException(sprintf('%s expects parameter 2 to be a positive integer: "%s" given', __METHOD__, $n));
        }

        if ($m === 0) {
            return $n + 1;
        }

        if ($n === 0) {
            return $this->ackermann($m - 1, 1);
        }

        return $this->ackermann($m - 1, $this->ackermann($m, $n - 1));
    }
}
