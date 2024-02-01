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

use App\FizzBuzz\FizzBuzz;
use PHPUnit\Framework\TestCase;

/**
 * Test FizzBuzz recursion
 */
final class FizzBuzzTest extends TestCase
{
    private const FIXTURES = [1, 2, 4, 7, 8, 11, 13, 14];

    /**
     * @var FizzBuzz|null
     */
    public ?FizzBuzz $fizzBuzz;

    protected function setUp(): void
    {
        $this->fizzBuzz = new FizzBuzz();
    }

    protected function tearDown(): void
    {
        $this->fizzBuzz = null;
    }

    public function testNegativeNumberShouldRaiseException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\FizzBuzz\FizzBuzz::fizzBuzz expects parameter 1 to be greater or equal to 1: "-1" given');

        $this->fizzBuzz->fizzBuzz(-1);
    }

    public function testZeroShouldRaiseException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\FizzBuzz\FizzBuzz::fizzBuzz expects parameter 1 to be greater or equal to 1: "0" given');

        $this->fizzBuzz->fizzBuzz(0);
    }

    /**
     * fizzBuzz should return 'Fizz' when number set to 3
     */
    public function testFizz(): void
    {
        $this->assertEquals('Fizz', $this->fizzBuzz->fizzBuzz(3));
    }

    /**
     * fizzBuzz should return 'Buzz' when number set to 5
     */
    public function testBuzz(): void
    {
        $this->assertEquals('Buzz', $this->fizzBuzz->fizzBuzz(5));
    }

    /**
     * fizzBuzz should return 'FizzBuzz' when number set to 15
     */
    public function testFizzBuzz(): void
    {
        $this->assertEquals('FizzBuzz', $this->fizzBuzz->fizzBuzz(15));
    }

    /**
     * fizzBuzz should return same given number
     */
    public function testFizzBuzzSequence(): void
    {
        foreach (self::FIXTURES as $number) {
            $this->assertEquals(strval($number), $this->fizzBuzz->fizzBuzz($number));
        }
    }
}
