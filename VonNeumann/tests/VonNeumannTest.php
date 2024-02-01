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

use App\VonNeumann\VonNeumann;
use PHPUnit\Framework\TestCase;

final class VonNeumannTest extends TestCase
{
    private const FIXTURES = [
        1234,
        5227,
        3215,
        3362,
        3030,
        1809,
        2724,
        4201,
        6484,
        422,
        7808,
    ];

    /**
     * @var VonNeumann|null
     */
    public ?VonNeumann $vonNeumann;

    public function setUp(): void
    {
        $this->vonNeumann = new VonNeumann();
    }

    protected function tearDown(): void
    {
        $this->vonNeumann = null;
    }

    public function testNegativeNumberShouldRaiseException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\VonNeumann\VonNeumann::pseudoRandom expects parameter 1 to be greater or equal to 1: "-1" given');

        $this->vonNeumann->pseudoRandom(-1);
    }

    public function testZeroShouldRaiseException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\VonNeumann\VonNeumann::pseudoRandom expects parameter 1 to be greater or equal to 1: "0" given');

        $this->vonNeumann->pseudoRandom(0);
    }

    public function testPseudoRandom()
    {
        for ($i = 0; $i < 10; ++$i) {
            $this->assertEquals(self::FIXTURES[$i + 1], $this->vonNeumann->pseudoRandom(self::FIXTURES[$i]));
        }
    }
}
