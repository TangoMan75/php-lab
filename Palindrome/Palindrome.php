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

namespace App\Palindrome;

/**
 * A palindrome is a word, phrase, or number that reads the same backward as it does forward.
 */
final class Palindrome
{
    /**
     * Check whether a given string is a palindrome or not.
     *
     * @param string $string the string to check
     *
     * @return bool true if the given string is a palindrome, false otherwise
     */
    public function isPalindrome(string $string): bool
    {
        // Remove any non-alphabetic characters and make the string lowercase.
        $string = preg_replace('/[^a-zA-Z]/', '', strtolower($string));

        if (empty($string)) {
            throw new \InvalidArgumentException(__METHOD__.' expects string to contain at least one character');
        }

        // Check if the string is the same forwards and backwards.
        return $string === strrev($string);
    }

    /**
     * Check whether a given string is a palindrome or not, using recursion.
     *
     * @param string $string the string to check
     *
     * @return bool true if the given string is a palindrome, false otherwise
     */
    public function isPalindromeRecursive(string $string): bool
    {
        // Remove any non-alphabetic characters and make the string lowercase.
        $string = preg_replace('/[^a-zA-Z]/', '', strtolower($string));

        if (empty($string)) {
            throw new \InvalidArgumentException(__METHOD__.' expects string to contain at least one character');
        }

        if (strlen($string) === 1) {
            return true;
        }

        if ($string[0] === $string[strlen($string) - 1]) {
            if (strlen($string) === 2) {
                return true;
            }

            return $this->isPalindromeRecursive(substr($string, 1, strlen($string) - 2));
        }

        return false;
    }
}
