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

namespace App\Syracuse;

/**
 * The Syracuse Conjecture, also known as the Collatz Conjecture, proposes that for any positive integer,
 * if it is even, divide it by two, and if it is odd, multiply it by three and add one, and repeat this process.
 * The conjecture suggests that no matter what number you start with, this sequence will eventually reach 1
 * and then continue cycling between 1 and 4. It's an unsolved problem in mathematics.
 */
final class Syracuse
{
    public function syracuse(int $number): array
    {
        if ($number < 1) {
            throw new \InvalidArgumentException(sprintf('%s expects parameter 1 to be greater or equal to 1: "%s" given', __METHOD__, $number));
        }

        return match (true) {
            $number == 1 => [$number],
            $number % 2 == 0 => array_merge([$number], $this->syracuse($number / 2)),
            default => array_merge([$number], $this->syracuse(($number * 3) + 1)),
        };
    }
}
