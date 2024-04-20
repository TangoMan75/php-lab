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

use App\SumEvenNumbers\SumEvenNumbers;
use PHPUnit\Framework\TestCase;

class SumEvenNumbersTest extends TestCase
{
    public function testSumEvenNumbersShouldRaiseExceptionWhenArrayContainsNonNumericValue(): void
    {
        $array = ['foobar'];
        $sum = new SumEvenNumbers();

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessage('App\SumEvenNumbers\SumEvenNumbers::SumEvenNumbers expects array to contain integers only');

        $sum->SumEvenNumbers($array);
    }

    public function testSumEvenNumbersShouldReturnZeroWhenArrayContainsOddNumbersOnly(): void
    {
        $array = [1, 3, 5];
        $sum = new SumEvenNumbers();

        $this->assertEquals(0, $sum->SumEvenNumbers($array));
    }

    public function testSumEvenNumbersShouldReturnExpectedResult(): void
    {
        $array = [1, 2, 3, 4, 5];
        $sum = new SumEvenNumbers();

        $this->assertEquals(6, $sum->SumEvenNumbers($array));
    }

    public function testSumEvenNumbersAltShouldRaiseExceptionWhenArrayContainsNonNumericValue(): void
    {
        $array = ['foobar'];
        $sum = new SumEvenNumbers();

        $this->expectException(\TypeError::class);
        $this->expectExceptionMessage('App\SumEvenNumbers\SumEvenNumbers::SumEvenNumbersAlt expects array to contain integers only');

        $sum->SumEvenNumbersAlt($array);
    }

    public function testSumEvenNumbersAltShouldReturnZeroWhenArrayContainsOddNumbersOnly(): void
    {
        $array = [1, 3, 5];
        $sum = new SumEvenNumbers();

        $this->assertEquals(0, $sum->SumEvenNumbersAlt($array));
    }

    public function testSumEvenNumbersAltShouldReturnExpectedResult(): void
    {
        $array = [1, 2, 3, 4, 5];
        $sum = new SumEvenNumbers();

        $this->assertEquals(6, $sum->SumEvenNumbersAlt($array));
    }
}
