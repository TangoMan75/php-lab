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

namespace App\TowerOfHanoi;

/**
 * Tower of Hanoi
 *
 * The Tower of Hanoi is a mathematical puzzle where you have 3 rods
 * and N disks of different sizes which can slide onto any rod. The
 * puzzle starts with the disks stacked in ascending order of size on
 * one rod, the smallest disk at the top.
 *
 * The objective of the puzzle is to move the entire stack to the last
 * rod, obeying the following rules:
 *
 * 1. Only one disk may be moved at a time.
 * 2. Each move consists of taking the upper disk from one of the stacks
 *    and placing it on top of another stack or an empty rod.
 * 3. No disk may be placed on top of a smaller disk.
 *
 * This class implements the Tower of Hanoi puzzle and provides a method
 * to return the list of steps required to solve the puzzle for a given
 * number of disks.
 */
class TowerOfHanoi
{
    /**
     * Returns the list of steps required to solve the puzzle for a given
     * number of disks.
     */
    public function towerOfHanoi(int $numDisks, string $startPole, string $endPole, string $sparePole): array
    {
        if ($numDisks < 1) {
            throw new \InvalidArgumentException(sprintf('%s expects parameter 1 to be greater or equal to 1: "%s" given', __METHOD__, $numDisks));
        }

        foreach ([$startPole, $endPole, $sparePole] as $pole) {
            if (!in_array($pole, ['A', 'B', 'C'])) {
                throw new \InvalidArgumentException(sprintf('%s expects pole parameters to contain "A", "B", or "C": "%s" given', __METHOD__, $pole));
            }
        }

        if (1 == $numDisks) {
            return [[$numDisks, $startPole, $endPole]];
        }

        return array_merge(
            $this->towerOfHanoi($numDisks - 1, $startPole, $sparePole, $endPole),
            [[$numDisks, $startPole, $endPole]],
            $this->towerOfHanoi($numDisks - 1, $sparePole, $endPole, $startPole)
        );
    }
}
