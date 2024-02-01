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

use App\PrimeNumbers\PrimeNumbers;
use PHPUnit\Framework\TestCase;

/**
 * Test PrimeNumbers recursion
 */
final class PrimeNumbersTest extends TestCase
{
    private const FIXTURES = [
        1 => false,
        2 => true,
        3 => true,
        4 => false,
        5 => true,
        6 => false,
        7 => true,
        8 => false,
        9 => false,
        10 => false,
        11 => true,
        12 => false,
        13 => true,
        14 => false,
        15 => false,
        16 => false,
        17 => true,
        18 => false,
        19 => true,
        20 => false,
        21 => false,
        22 => false,
        23 => true,
        24 => false,
        25 => false,
        26 => false,
        27 => false,
        28 => false,
        29 => true,
    ];

    /**
     * @var PrimeNumbers|null
     */
    public ?PrimeNumbers $primeNumbers;

    protected function setUp(): void
    {
        $this->primeNumbers = new PrimeNumbers();
    }

    protected function tearDown(): void
    {
        $this->primeNumbers = null;
    }

    /**
     * number should raise Exception when set to negative value
     */
    public function testNegativeNumberShouldRaiseException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\PrimeNumbers\PrimeNumbers::isPrime expects parameter 1 to be greater or equal to 1: "-1" given');

        $this->primeNumbers->isPrime(-1);
    }

    /**
     * number should raise Exception when set to zero
     */
    public function testZeroShouldRaiseException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\PrimeNumbers\PrimeNumbers::isPrime expects parameter 1 to be greater or equal to 1: "0" given');

        $this->primeNumbers->isPrime(0);
    }

    /**
     * primeNumbers method should return expected sequence
     *
     * @throws Exception
     */
    public function testPrimeNumbersSequence(): void
    {
        foreach (self::FIXTURES as $i => $expected) {
            $this->assertSame($expected, $this->primeNumbers->isPrime($i));
        }
    }
}
