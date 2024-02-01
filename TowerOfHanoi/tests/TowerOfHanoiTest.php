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

use App\TowerOfHanoi\TowerOfHanoi;
use PHPUnit\Framework\TestCase;

final class TowerOfHanoiTest extends TestCase
{
    private const FIXTURES = [
        [1, 'A', 'C', 'B'],
        [
            [1, 'A', 'C'],
        ],
        [2, 'A', 'C', 'B'],
        [
            [1, 'A', 'B'],
            [2, 'A', 'C'],
            [1, 'B', 'C'],
        ],
        [3, 'A', 'C', 'B'],
        [
            [1, 'A', 'C'],
            [2, 'A', 'B'],
            [1, 'C', 'B'],
            [3, 'A', 'C'],
            [1, 'B', 'A'],
            [2, 'B', 'C'],
            [1, 'A', 'C'],
        ],
        [4, 'A', 'C', 'B'],
        [
            [1, 'A', 'B'],
            [2, 'A', 'C'],
            [1, 'B', 'C'],
            [3, 'A', 'B'],
            [1, 'C', 'A'],
            [2, 'C', 'B'],
            [1, 'A', 'B'],
            [4, 'A', 'C'],
            [1, 'B', 'C'],
            [2, 'B', 'A'],
            [1, 'C', 'A'],
            [3, 'B', 'C'],
            [1, 'A', 'B'],
            [2, 'A', 'C'],
            [1, 'B', 'C'],
        ],
    ];

    /**
     * @var TowerOfHanoi|null
     */
    public ?TowerOfHanoi $towerOfHanoi;

    protected function setUp(): void
    {
        $this->towerOfHanoi = new TowerOfHanoi();
    }

    protected function tearDown(): void
    {
        $this->towerOfHanoi = null;
    }

    public function testNegativeNumDisks()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\TowerOfHanoi\TowerOfHanoi::towerOfHanoi expects parameter 1 to be greater or equal to 1: "-1" given');

        $this->towerOfHanoi->towerOfHanoi(-1, 'A', 'B', 'C');
    }

    public function testNullNumDisks()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\TowerOfHanoi\TowerOfHanoi::towerOfHanoi expects parameter 1 to be greater or equal to 1: "0" given');

        $this->towerOfHanoi->towerOfHanoi(0, 'A', 'B', 'C');
    }

    public function testPolesInvalidValue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('App\TowerOfHanoi\TowerOfHanoi::towerOfHanoi expects pole parameters to contain "A", "B", or "C": "X" given');

        $this->towerOfHanoi->towerOfHanoi(1, 'X', 'B', 'C');
        $this->towerOfHanoi->towerOfHanoi(1, 'A', 'X', 'C');
        $this->towerOfHanoi->towerOfHanoi(1, 'A', 'B', 'X');
    }

    public function testTowerOfHanoiSequence()
    {
        for ($i = 0; $i < 7; $i += 2) {
            $this->assertEquals(
                self::FIXTURES[$i + 1],
                $this->towerOfHanoi->towerOfHanoi(self::FIXTURES[$i][0], self::FIXTURES[$i][1], self::FIXTURES[$i][2], self::FIXTURES[$i][3])
            );
        }
    }
}
