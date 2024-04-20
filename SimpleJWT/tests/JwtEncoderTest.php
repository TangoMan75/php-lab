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

namespace TangoMan\SimpleJWT\Tests;

use PHPUnit\Framework\TestCase;
use TangoMan\SimpleJWT\Encoder\JwtEncoder;

final class JwtEncoderTest extends TestCase
{
    private const SECRET = 'secret';

    private const EXPECTED_ARRAY = [
        'header' => [
            'alg' => 'HS256',
            'typ' => 'JWT',
        ],
        'claims' => ['foo' => 'bar'],
        'signature' => '76dc5633a308720a1e3201fceed1afb0d0d8e9c1d62fa3065b82de62f9e6d490',
    ];

    private const EXPECTED_STRING = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJmb28iOiJiYXIifQ.76dc5633a308720a1e3201fceed1afb0d0d8e9c1d62fa3065b82de62f9e6d490';

    /**
     * @var JwtEncoder|null
     */
    public ?JwtEncoder $encoder;

    protected function setUp(): void
    {
        $this->encoder = new JwtEncoder(self::SECRET);
    }

    protected function tearDown(): void
    {
        $this->encoder = null;
    }

    /**
     * @throws \Exception
     */
    public function testEncodeShouldReturnExpectedResult(): void
    {
        $this->assertEquals(self::EXPECTED_STRING, $this->encoder->encode(['foo' => 'bar']));
    }

    /**
     * @throws \Exception
     */
    public function testDecodeShouldReturnExpectedResult(): void
    {
        $this->assertEquals(self::EXPECTED_ARRAY, $this->encoder->decode(self::EXPECTED_STRING));
    }

    /**
     * @throws \Exception
     */
    public function testIsValidShouldReturnExpectedResult(): void
    {
        $this->assertTrue($this->encoder->isValid(self::EXPECTED_STRING));
    }
}
