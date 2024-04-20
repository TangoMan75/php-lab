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

namespace App\Rot13;

/**
 * Rot13
 */
final class Rot13
{
    /**
     * ROT13 is a simple letter substitution cipher that shifts each letter 13 positions forward in the alphabet. It's a weak
     * encryption method commonly used for obfuscation and hiding spoilers. Applying ROT13 twice reverses the encryption.
     */
    public function rot13(string $text): string
    {
        $result = '';
        foreach (str_split($text) as $char) {
            if (ctype_alpha($char)) {
                $asciiOffset = ord($char) <= 90 ? 65 : 97;
                $rotated = (ord($char) - $asciiOffset + 13) % 26 + $asciiOffset;
                $result .= chr($rotated);
            } else {
                $result .= $char;
            }
        }

        return $result;
    }
}
