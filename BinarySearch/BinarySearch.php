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

namespace App\BinarySearch;

/**
 * BinarySearch
 *
 * A binary search algorithm is a search technique that finds the position of a target value within a sorted array.
 * It works by repeatedly dividing the search interval in half until the target is found.
 */
final class BinarySearch
{
    public function binarySearch($array, $thingToFind, $start = 0, $end = null): bool
    {
        if ($end === null) {
            $end = count($array) - 1;
        }

        if ($start > $end) {
            return false;
        }

        $mid = floor(($start + $end) / 2);

        if ($array[$mid] === $thingToFind) {
            return true;
        }

        if ($thingToFind < $array[$mid]) {
            return $this->binarySearch($array, $thingToFind, $start, $mid - 1);
        }

        if ($thingToFind > $array[$mid]) {
            return $this->binarySearch($array, $thingToFind, $mid + 1, $end);
        }

        return false;
    }
}
