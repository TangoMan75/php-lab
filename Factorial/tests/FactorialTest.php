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

use App\Factorial\Factorial;
use PHPUnit\Framework\TestCase;

/**
 * Test Factorial recursion
 */
final class FactorialTest extends TestCase
{
    private const FIXTURES = [
        1,
        2,
        6,
        24,
        120,
        720,
        5040,
        40320,
        362880,
        3628800,
    ];

    /**
     * @var Factorial|null
     */
    public ?Factorial $factorial;

    protected function setUp(): void
    {
        $this->factorial = new Factorial();
    }

    protected function tearDown(): void
    {
        $this->factorial = null;
    }

    /**
     * number should raise Exception when set to negative value
     */
    public function testNegativeNumberShouldRaiseException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\Factorial\Factorial::factorial expects parameter 1 to be a positive integer: "-1" given');

        $this->factorial->factorial(-1);
    }

    /**
     * factorial method should return expected sequence
     */
    public function testFactorialSequence(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $this->assertEquals(self::FIXTURES[$i], $this->factorial->factorial($i + 1));
        }
    }
}
