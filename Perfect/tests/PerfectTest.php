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

use App\Perfect\Perfect;
use PHPUnit\Framework\TestCase;

class PerfectTest extends TestCase
{
    private const FIXTURES = [
        1 => false,
        2 => false,
        3 => false,
        4 => false,
        5 => false,
        6 => true,
        7 => false,
        8 => false,
        9 => false,
        10 => false,
        11 => false,
        12 => false,
        13 => false,
        14 => false,
        15 => false,
        16 => false,
        17 => false,
        18 => false,
        19 => false,
        20 => false,
        21 => false,
        22 => false,
        23 => false,
        24 => false,
        25 => false,
        26 => false,
        27 => false,
        28 => true,
        29 => false,
    ];

    /**
     * @var Perfect|null
     */
    public ?Perfect $perfect;

    public function setUp(): void
    {
        $this->perfect = new Perfect();
    }

    protected function tearDown(): void
    {
        $this->perfect = null;
    }

    public function testIsPerfectShouldRaiseExceptionWhenGivenNegativeNumber()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\Perfect\Perfect::isPerfect expects parameter 1 to be a positive integer: "-1" given');

        $this->perfect->isPerfect(-1);
    }

    /**
     * @throws Exception
     */
    public function testIsPerfect()
    {
        $this->assertFalse($this->perfect->isPerfect(3));
        $this->assertTrue($this->perfect->isPerfect(6));
    }

    /**
     * @throws Exception
     */
    public function testIsPerfectSequence()
    {
        foreach (self::FIXTURES as $i => $expected) {
            $this->assertSame($expected, $this->perfect->isPerfect($i));
        }
    }
}
