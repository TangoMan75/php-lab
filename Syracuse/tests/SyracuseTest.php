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

use App\Syracuse\Syracuse;
use PHPUnit\Framework\TestCase;

final class SyracuseTest extends TestCase
{
    private const FIXTURES = [
        [1],
        [2, 1],
        [3, 10, 5, 16, 8, 4, 2, 1],
        [4, 2, 1],
        [5, 16, 8, 4, 2, 1],
        [6, 3, 10, 5, 16, 8, 4, 2, 1],
        [7, 22, 11, 34, 17, 52, 26, 13, 40, 20, 10, 5, 16, 8, 4, 2, 1],
        [8, 4, 2, 1],
        [9, 28, 14, 7, 22, 11, 34, 17, 52, 26, 13, 40, 20, 10, 5, 16, 8, 4, 2, 1],
        [10, 5, 16, 8, 4, 2, 1],
        [11, 34, 17, 52, 26, 13, 40, 20, 10, 5, 16, 8, 4, 2, 1],
        [12, 6, 3, 10, 5, 16, 8, 4, 2, 1],
        [13, 40, 20, 10, 5, 16, 8, 4, 2, 1],
        [14, 7, 22, 11, 34, 17, 52, 26, 13, 40, 20, 10, 5, 16, 8, 4, 2, 1],
        [15, 46, 23, 70, 35, 106, 53, 160, 80, 40, 20, 10, 5, 16, 8, 4, 2, 1],
        [16, 8, 4, 2, 1],
        [17, 52, 26, 13, 40, 20, 10, 5, 16, 8, 4, 2, 1],
        [18, 9, 28, 14, 7, 22, 11, 34, 17, 52, 26, 13, 40, 20, 10, 5, 16, 8, 4, 2, 1],
        [19, 58, 29, 88, 44, 22, 11, 34, 17, 52, 26, 13, 40, 20, 10, 5, 16, 8, 4, 2, 1],
        [20, 10, 5, 16, 8, 4, 2, 1],
        [21, 64, 32, 16, 8, 4, 2, 1],
        [22, 11, 34, 17, 52, 26, 13, 40, 20, 10, 5, 16, 8, 4, 2, 1],
        [23, 70, 35, 106, 53, 160, 80, 40, 20, 10, 5, 16, 8, 4, 2, 1],
        [24, 12, 6, 3, 10, 5, 16, 8, 4, 2, 1],
    ];

    /**
     * @var Syracuse|null
     */
    public ?Syracuse $syracuse;

    protected function setUp(): void
    {
        $this->syracuse = new Syracuse();
    }

    protected function tearDown(): void
    {
        $this->syracuse = null;
    }

    public function testNegativeNumberShouldRaiseException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\Syracuse\Syracuse::syracuse expects parameter 1 to be greater or equal to 1: "-1" given');

        $this->syracuse->syracuse(-1);
    }

    public function testZeroShouldRaiseException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\Syracuse\Syracuse::syracuse expects parameter 1 to be greater or equal to 1: "0" given');

        $this->syracuse->syracuse(0);
    }

    public function testSyracuseSequence()
    {
        for ($i = 1; $i < 25; ++$i) {
            $this->assertEquals(self::FIXTURES[$i - 1], $this->syracuse->syracuse($i));
        }
    }
}
