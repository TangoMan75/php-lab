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

use App\Poker\PokerHandStrengthCalculator;
use PHPUnit\Framework\TestCase;

final class PokerHandStrengthCalculatorTest extends TestCase
{
    public function testRoyalFlush(): void
    {
        $communityCards = [['2', 'H'], ['3', 'H'], ['T', 'H'], ['J', 'H'], ['Q', 'H']];
        $playerCards = [['A', 'H'], ['K', 'H']];

        $expectedRank = 9;
        $expectedHand = [['A', 'H'], ['K', 'H'], ['Q', 'H'], ['J', 'H'], ['T', 'H']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testRoyalFlushEdgeCase(): void
    {
        $communityCards = [['A', 'C'], ['A', 'S'], ['T', 'H'], ['J', 'H'], ['Q', 'H']];
        $playerCards = [['A', 'H'], ['K', 'H']];

        $expectedRank = 9;
        $expectedHand = [['A', 'H'], ['K', 'H'], ['Q', 'H'], ['J', 'H'], ['T', 'H']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testStraightFlush(): void
    {
        $communityCards = [['2', 'H'], ['3', 'H'], ['4', 'H'], ['5', 'H'], ['6', 'H']];
        $playerCards = [['7', 'H'], ['8', 'H']];

        $expectedRank = 8;
        $expectedHand = [['8', 'H'], ['7', 'H'], ['6', 'H'], ['5', 'H'], ['4', 'H']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testWheelFlush(): void
    {
        $communityCards = [['2', 'H'], ['3', 'H'], ['4', 'H'], ['5', 'C'], ['6', 'C']];
        $playerCards = [['A', 'H'], ['5', 'H']];

        $expectedRank = 8;
        $expectedHand = [['5', 'H'], ['4', 'H'], ['3', 'H'], ['2', 'H'], ['A', 'H']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testWheelFlushEdgeCase(): void
    {
        $communityCards = [['2', 'H'], ['3', 'H'], ['4', 'H'], ['5', 'H'], ['T', 'C']];
        $playerCards = [['A', 'C'], ['A', 'H']];

        $expectedRank = 8;
        $expectedHand = [['5', 'H'], ['4', 'H'], ['3', 'H'], ['2', 'H'], ['A', 'H']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testFourOfAKind(): void
    {
        $communityCards = [['2', 'H'], ['2', 'D'], ['2', 'S'], ['3', 'C'], ['6', 'H']];
        $playerCards = [['A', 'C'], ['2', 'C']];

        $expectedRank = 7;
        $expectedHand = [['2', 'S'], ['2', 'H'], ['2', 'D'], ['2', 'C'], ['A', 'C']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testFullHouse(): void
    {
        $communityCards = [['2', 'H'], ['2', 'D'], ['3', 'S'], ['3', 'C'], ['3', 'H']];
        $playerCards = [['7', 'H'], ['8', 'D']];

        $expectedRank = 6;
        $expectedHand = [['3', 'S'], ['3', 'H'], ['3', 'C'], ['2', 'H'], ['2', 'D']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testFlush(): void
    {
        $communityCards = [['2', 'H'], ['4', 'H'], ['6', 'H'], ['8', 'C'], ['T', 'D']];
        $playerCards = [['A', 'H'], ['8', 'H']];

        $expectedRank = 5;
        $expectedHand = [['A', 'H'], ['8', 'H'], ['6', 'H'], ['4', 'H'], ['2', 'H']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testStraight(): void
    {
        $communityCards = [['2', 'H'], ['3', 'D'], ['4', 'H'], ['5', 'C'], ['6', 'H']];
        $playerCards = [['7', 'S'], ['8', 'H']];

        $expectedRank = 4;
        $expectedHand = [['8', 'H'], ['7', 'S'], ['6', 'H'], ['5', 'C'], ['4', 'H']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testWheel(): void
    {
        $communityCards = [['2', 'H'], ['3', 'C'], ['4', 'H'], ['T', 'C'], ['Q', 'C']];
        $playerCards = [['A', 'H'], ['5', 'C']];

        $expectedRank = 4;
        $expectedHand = [['5', 'C'], ['4', 'H'], ['3', 'C'], ['2', 'H'], ['A', 'H']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testWheelEdgeCase(): void
    {
        $communityCards = [['2', 'H'], ['3', 'C'], ['4', 'H'], ['5', 'C'], ['Q', 'C']];
        $playerCards = [['A', 'H'], ['6', 'C']];

        $expectedRank = 4;
        $expectedHand = [['6', 'C'], ['5', 'C'], ['4', 'H'], ['3', 'C'], ['2', 'H']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testThreeOfAKind(): void
    {
        $communityCards = [['2', 'H'], ['3', 'D'], ['3', 'H'], ['3', 'C'], ['6', 'H']];
        $playerCards = [['7', 'S'], ['8', 'H']];

        $expectedRank = 3;
        $expectedHand = [['3', 'H'], ['3', 'D'], ['3', 'C'], ['8', 'H'], ['7', 'S']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testTwoPair(): void
    {
        $communityCards = [['2', 'H'], ['2', 'D'], ['3', 'H'], ['3', 'C'], ['6', 'H']];
        $playerCards = [['7', 'S'], ['8', 'H']];

        $expectedRank = 2;
        $expectedHand = [['3', 'H'], ['3', 'C'], ['2', 'H'], ['2', 'D'], ['8', 'H']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testOnePair(): void
    {
        $communityCards = [['2', 'H'], ['3', 'D'], ['4', 'H'], ['4', 'C'], ['6', 'H']];
        $playerCards = [['7', 'S'], ['8', 'H']];

        $expectedRank = 1;
        $expectedHand = [['4', 'H'], ['4', 'C'], ['8', 'H'], ['7', 'S'], ['6', 'H']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }

    public function testHighCard(): void
    {
        $communityCards = [['2', 'C'], ['4', 'D'], ['6', 'H'], ['8', 'C'], ['T', 'H']];
        $playerCards = [['A', 'H'], ['K', 'H']];

        $expectedRank = 0;
        $expectedHand = [['A', 'H'], ['K', 'H'], ['T', 'H'], ['8', 'C'], ['6', 'H']];

        $handEvaluator = new PokerHandStrengthCalculator($communityCards, $playerCards);
        $this->assertEquals($expectedRank, $handEvaluator->getRank());
        $this->assertEquals($expectedHand, $handEvaluator->getHand());
    }
}
