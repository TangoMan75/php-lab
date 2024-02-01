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

use App\Stocks\Stocks;
use PHPUnit\Framework\TestCase;

final class StocksTest extends TestCase
{
    private const EXPECTED = ['NFLX', 'META', 'GOOGL'];

    private const STOCKS_LIST = ['AMZN', 'GOOGL', 'META', 'NFLX'];

    private const PRICES_LIST = [
        [10, 11, 12, 13, 14],
        [20, 21, 22, 23, 24],
        [30, 31, 32, 33, 34],
        [40, 41, 42, 43, 44],
    ];

    /**
     * @var Stocks|null
     */
    private ?Stocks $stocks;

    public function setUp(): void
    {
        $this->stocks = new Stocks();
    }

    protected function tearDown(): void
    {
        $this->stocks = null;
    }

    public function testDifferentListLengthSizeShouldRaiseException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\Stocks\Stocks::getTopThree expects both arrays to have same length');

        $this->stocks->getTopThree(['foo', 'bar'], [[1]]);
    }

    public function testUndersizedListsShouldRaiseException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\Stocks\Stocks::getTopThree expects arrays to contain at least three items');

        $this->stocks->getTopThree(['foo', 'bar'], [[1], [2]]);
    }

    public function testGetTopThree()
    {
        $this->assertEquals(self::EXPECTED, $this->stocks->getTopThree(self::STOCKS_LIST, self::PRICES_LIST));
    }
}
