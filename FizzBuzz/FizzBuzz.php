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

namespace App\FizzBuzz;

/**
 * FizzBuzz
 *
 * This script is inspired by the following Tom Scott video :
 * "FizzBuzz: One Simple Interview Question"
 * https://www.youtube.com/watch?v=QPZ0pIK_wsc
 */
final class FizzBuzz
{
    public function fizzBuzz(int $number): string
    {
        if ($number < 1) {
            throw new \InvalidArgumentException(sprintf('%s expects parameter 1 to be greater or equal to 1: "%s" given', __METHOD__, $number));
        }

        $string = '';

        if ($number % 3 === 0) {
            $string = 'Fizz';
        }

        if ($number % 5 === 0) {
            $string .= 'Buzz';
        }

        if ($string === '') {
            return strval($number);
        }

        return $string;
    }
}
