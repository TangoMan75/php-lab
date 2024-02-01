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

use App\Ackermann\Ackermann;
use PHPUnit\Framework\TestCase;

/**
 * Test Ackermann recursion
 */
final class AckermannTest extends TestCase
{
    private const FIXTURES = [
        [1, 2, 3, 4, 5, 6],
        [2, 3, 4, 5, 6, 7],
        [3, 5, 7, 9, 11, 13],
        [5, 13, 29, 61, 125, 253],
    ];

    /**
     * @var Ackermann|null
     */
    public ?Ackermann $ackermann;

    protected function setUp(): void
    {
        $this->ackermann = new Ackermann();
    }

    protected function tearDown(): void
    {
        $this->ackermann = null;
    }

    /**
     * m should raise Exception when set to negative value
     */
    public function testFirstParameterNegativeNumberShouldRaiseException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\Ackermann\Ackermann::ackermann expects parameter 1 to be a positive integer: "-1" given');

        $this->ackermann->ackermann(-1, 0);
    }

    /**
     * n should raise Exception when set to negative value
     */
    public function testSecondParameterNegativeNumberShouldRaiseException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\Ackermann\Ackermann::ackermann expects parameter 2 to be a positive integer: "-1" given');

        $this->ackermann->ackermann(0, -1);
    }

    /**
     * ackermann method should return expected sequence
     */
    public function testAckermannSequence(): void
    {
        for ($i = 0; $i < 4; ++$i) {
            for ($j = 0; $j < 6; ++$j) {
                $this->assertEquals(self::FIXTURES[$i][$j], $this->ackermann->ackermann($i, $j));
            }
        }
    }
}
