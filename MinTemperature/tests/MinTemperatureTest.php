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

use App\MinTemperature\MinTemperature;
use PHPUnit\Framework\TestCase;

final class MinTemperatureTest extends TestCase
{
    /**
     * @var MinTemperature|null
     */
    public ?MinTemperature $minTemperature;

    protected function setUp(): void
    {
        $this->minTemperature = new MinTemperature();
    }

    protected function tearDown(): void
    {
        $this->minTemperature = null;
    }

    public function testGetClosestToZeroShouldRaiseExceptionWhenTemperatureArrayEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        // $this->expectExceptionMessage('App\MinTemperature\MinTemperature::getClosestToZero expects temperature array to contain at least one value');
        $this->minTemperature->getClosestToZero([]);
    }

    public function testGetClosestToZeroShouldRaiseExceptionWhenGivenInvalidTemperatureArray()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\MinTemperature\MinTemperature::getClosestToZero expects temperature array to contain integers only');
        $this->minTemperature->getClosestToZero([1, 'a']);
    }

    public function testGetClosestToZeroOneNegativeTemperature()
    {
        $this->assertEquals(-273, $this->minTemperature->getClosestToZero([-273]));
    }

    public function testGetClosestToZeroTwoNegativeTemperatures()
    {
        $this->assertEquals(-10, $this->minTemperature->getClosestToZero([-10, -10]));
    }

    public function testGetClosestToZeroSimple()
    {
        $this->assertEquals(1, $this->minTemperature->getClosestToZero([1, -2, -8, 4, 5]));
    }

    public function testGetClosestToZeroComplex()
    {
        $this->assertEquals(2, $this->minTemperature->getClosestToZero([-5, -4, -2, 12, -40, 4, 2, 18, 11, 5]));
    }

    // --------------------------------------------------

    public function testGetMinimumPositiveTemperatureShouldRaiseExceptionWhenTemperatureArrayEmpty()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\MinTemperature\MinTemperature::getMinimumPositiveTemperature expects temperature array to contain at least one value');
        $this->minTemperature->getMinimumPositiveTemperature([]);
    }

    public function testGetMinimumPositiveTemperatureShouldRaiseExceptionWhenGivenInvalidTemperatureArray()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\MinTemperature\MinTemperature::getMinimumPositiveTemperature expects temperature array to contain integers only');
        $this->minTemperature->getMinimumPositiveTemperature([1, 'a']);
    }

    public function testGetMinimumPositiveTemperatureShouldRaiseExceptionWhenTemperatureArrayContainsNoPositiveValues()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\MinTemperature\MinTemperature::getMinimumPositiveTemperature expects temperature array to contain at least one positive value');
        $this->minTemperature->getMinimumPositiveTemperature([-273]);
    }

    public function testGetMinimumPositiveTemperatureSimple()
    {
        $this->assertEquals(1, $this->minTemperature->getMinimumPositiveTemperature([1, -2, -8, 4, 5]));
    }

    public function testGetMinimumPositiveTemperatureComplex()
    {
        $this->assertEquals(2, $this->minTemperature->getMinimumPositiveTemperature([-5, -4, -2, 12, -40, 4, 2, 18, 11, 5]));
    }
}
