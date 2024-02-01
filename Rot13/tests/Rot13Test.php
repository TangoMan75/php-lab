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

use App\Rot13\Rot13;
use PHPUnit\Framework\TestCase;

final class Rot13Test extends TestCase
{
    protected Rot13 $rot13;

    public function setUp(): void
    {
        $this->rot13 = new Rot13();
    }

    public function testRot13Encryption()
    {
        $this->assertEquals('Uryyb, Jbeyq!', $this->rot13->rot13('Hello, World!'));
    }

    public function testRot13Decryption()
    {
        $this->assertEquals('Hello, World!', $this->rot13->rot13('Uryyb, Jbeyq!'));
    }

    public function testRot13EdgeCases()
    {
        $this->assertEquals('', $this->rot13->rot13(''));
        $this->assertEquals('123', $this->rot13->rot13('123'));
        $this->assertEquals('+-*/', $this->rot13->rot13('+-*/'));
    }
}
