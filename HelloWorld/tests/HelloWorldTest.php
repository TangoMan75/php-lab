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

use App\HelloWorld\HelloWorld;
use PHPUnit\Framework\TestCase;

final class HelloWorldTest extends TestCase
{
    /**
     * @var HelloWorld|null
     */
    public ?HelloWorld $helloWorld;

    protected function setUp(): void
    {
        $this->helloWorld = new HelloWorld();
    }

    protected function tearDown(): void
    {
        $this->helloWorld = null;
    }

    /**
     * helloWorld should return 'Hello world!'
     */
    public function testHelloWorld(): void
    {
        $this->assertEquals('Hello world!', $this->helloWorld->helloWorld());
    }
}
