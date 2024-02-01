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

use App\Fibonacci\Fibonacci;
use PHPUnit\Framework\TestCase;

/**
 * Test Fibonacci recursion
 */
final class FibonacciTest extends TestCase
{
    private const FIXTURES = [1, 1, 2, 3, 5, 8, 13, 21, 34, 55];

    /**
     * @var Fibonacci|null
     */
    public ?Fibonacci $fibonacci;

    protected function setUp(): void
    {
        $this->fibonacci = new Fibonacci();
    }

    protected function tearDown(): void
    {
        $this->fibonacci = null;
    }

    /**
     * number should raise Exception when set to negative value
     */
    public function testNegativeNumberShouldRaiseException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\Fibonacci\Fibonacci::fibonacci expects parameter 1 to be greater or equal to 1: "-1" given');

        $this->fibonacci->fibonacci(-1);
    }

    /**
     * number should raise Exception when set to zero
     */
    public function testZeroShouldRaiseException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\Fibonacci\Fibonacci::fibonacci expects parameter 1 to be greater or equal to 1: "0" given');

        $this->fibonacci->fibonacci(0);
    }

    /**
     * fibonacci method should return expected sequence
     *
     * @throws Exception
     */
    public function testFibonacciSequence(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $this->assertEquals(self::FIXTURES[$i], $this->fibonacci->fibonacci($i + 1));
        }
    }
}
