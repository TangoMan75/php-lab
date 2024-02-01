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

namespace App\MinTemperature;

/**
 * MinTemperature
 */
final class MinTemperature
{
    public function getClosestToZero(array $temperatures): int
    {
        if (empty($temperatures)) {
            throw new \InvalidArgumentException(__METHOD__.' expects temperature array to contain at least one value');
        }

        if (count(array_filter($temperatures, 'is_int')) !== count($temperatures)) {
            throw new \InvalidArgumentException(__METHOD__.' expects temperature array to contain integers only');
        }

        if (count($temperatures) === 1) {
            return $temperatures[0];
        }

        // initialize `$closest` integer with first value from temperatures array
        $closest = $temperatures[0];

        foreach ($temperatures as $temperature) {
            if (abs($temperature) < abs($closest)) {
                $closest = $temperature;

            // when two absolute values are equals, keep positive temperature if any
            } elseif (abs($temperature) === abs($closest) && $closest < 0) {
                $closest = $temperature;
            }
        }

        return $closest;
    }

    public function getMinimumPositiveTemperature(array $temperatures): int
    {
        if (empty($temperatures)) {
            throw new \InvalidArgumentException(__METHOD__.' expects temperature array to contain at least one value');
        }

        if (count(array_filter($temperatures, 'is_int')) !== count($temperatures)) {
            throw new \InvalidArgumentException(__METHOD__.' expects temperature array to contain integers only');
        }

        $result = array_filter($temperatures, function ($value) {
            return $value > 0;
        });

        if (count($result) === 0) {
            throw new \InvalidArgumentException(__METHOD__.' expects temperature array to contain at least one positive value');
        }

        return min($result);
    }
}
