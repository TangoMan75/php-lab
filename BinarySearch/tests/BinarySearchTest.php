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

namespace Tests;

use App\BinarySearch\BinarySearch;
use PHPUnit\Framework\TestCase;

class BinarySearchTest extends TestCase
{
    public function testShouldReturnTrueIfValueIsFound()
    {
        $array = [1, 2, 3, 4, 5];
        $search = new BinarySearch();

        $this->assertTrue($search->binarySearch($array, 3));
    }

    public function testShouldReturnFalseIfValueIsNotFound()
    {
        $array = [1, 2, 3, 4, 5];
        $search = new BinarySearch();

        $this->assertFalse($search->binarySearch($array, 0));
    }

    public function testShouldWorkOnEmptyArray()
    {
        $array = [];
        $search = new BinarySearch();

        $this->assertFalse($search->binarySearch($array, 1));
    }

    public function testShouldReturnTrueWithStartAndEndIndices()
    {
        $array = [1, 2, 3, 4, 5];
        $search = new BinarySearch();

        $this->assertTrue($search->binarySearch($array, 4, 2, 4));
    }
}
