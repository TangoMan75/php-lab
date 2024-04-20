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

use App\Palindrome\Palindrome;
use PHPUnit\Framework\TestCase;

/**
 * Test Palindrome recursion
 */
final class PalindromeTest extends TestCase
{
    /**
     * @var Palindrome|null
     */
    public ?Palindrome $palindrome;

    protected function setUp(): void
    {
        $this->palindrome = new Palindrome();
    }

    protected function tearDown(): void
    {
        $this->palindrome = null;
    }

    public function testIsPalindromeEmptyStringShouldRaiseException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\Palindrome\Palindrome::isPalindrome expects string to contain at least one character');

        $this->palindrome->isPalindrome('');
    }

    public function testIsPalindromeShouldReturnTrue()
    {
        $this->assertTrue($this->palindrome->isPalindrome('noon'));
        $this->assertTrue($this->palindrome->isPalindrome('racecar'));
        $this->assertTrue($this->palindrome->isPalindrome('A man, a plan, a canal, Panama!'));
    }

    public function testIsPalindromeShouldReturnFalse()
    {
        $this->assertFalse($this->palindrome->isPalindrome('This is not a palindrome'));
    }

    public function testIsPalindromeRecursiveEmptyStringShouldRaiseException(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('App\Palindrome\Palindrome::isPalindromeRecursive expects string to contain at least one character');

        $this->palindrome->isPalindromeRecursive('');
    }

    public function testIsPalindromeRecursiveShouldReturnTrue()
    {
        $this->assertTrue($this->palindrome->isPalindromeRecursive('noon'));
        $this->assertTrue($this->palindrome->isPalindromeRecursive('racecar'));
        $this->assertTrue($this->palindrome->isPalindromeRecursive('A man, a plan, a canal, Panama!'));
    }

    public function testIsPalindromeRecursiveShouldReturnFalse()
    {
        $this->assertFalse($this->palindrome->isPalindromeRecursive('This is not a palindrome'));
    }
}
