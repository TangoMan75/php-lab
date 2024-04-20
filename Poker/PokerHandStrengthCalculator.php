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

namespace App\Poker;

final class PokerHandStrengthCalculator
{
    private const RANKS = [
        'A' => 14,
        'K' => 13,
        'Q' => 12,
        'J' => 11,
        'T' => 10,
        '9' => 9,
        '8' => 8,
        '7' => 7,
        '6' => 6,
        '5' => 5,
        '4' => 4,
        '3' => 3,
        '2' => 2,
    ];

    private const SUITS = [
        'S' => 4,
        'H' => 3,
        'D' => 2,
        'C' => 1,
    ];

    public const HANDS = [
        'High card',
        'Pair',
        'Two pair',
        'Three of a kind',
        'Straight',
        'Flush',
        'Full House',
        'Four of a kind',
        'Straight flush',
        'Royal flush',
    ];

    private array $communityCards;
    private array $playerCards;
    private array $hand;
    private ?int $rank;

    public function __construct(array $communityCards, array $playerCards)
    {
        $this->communityCards = $communityCards;
        $this->playerCards = $playerCards;
        $this->hand = [];
        $this->rank = null;
        $this->evaluateHand();
    }

    private function evaluateHand(): void
    {
        $cards = $this->sortCards(array_merge($this->communityCards, $this->playerCards));

        $straightFlush = $this->checkStraightFlush($cards);
        if ($straightFlush && $straightFlush[0][0] == 'A') {
            $this->rank = 9;
            $this->hand = $straightFlush;

            return;
        }

        if ($straightFlush) {
            $this->rank = 8;
            $this->hand = $straightFlush;

            return;
        }

        $fourOfAKind = $this->checkFourOfAKind($cards);
        if ($fourOfAKind) {
            $this->rank = 7;
            $this->hand = $fourOfAKind;

            return;
        }

        $fullHouse = $this->checkFullHouse($cards);
        if ($fullHouse) {
            $this->rank = 6;
            $this->hand = $fullHouse;

            return;
        }

        $flush = $this->checkFlush($cards);
        if ($flush) {
            $this->rank = 5;
            $this->hand = $flush;

            return;
        }

        $straight = $this->checkStraight($cards);
        if ($straight) {
            $this->rank = 4;
            $this->hand = $straight;

            return;
        }

        $threeOfAKind = $this->checkThreeOfAKind($cards);
        if ($threeOfAKind) {
            $this->rank = 3;
            $this->hand = $threeOfAKind;

            return;
        }

        $twoPair = $this->checkTwoPair($cards);
        if ($twoPair) {
            $this->rank = 2;
            $this->hand = $twoPair;

            return;
        }

        $onePair = $this->checkOnePair($cards);
        if ($onePair) {
            $this->rank = 1;
            $this->hand = $onePair;

            return;
        }

        $this->rank = 0;
        $this->hand = array_slice($cards, 0, 5);
    }

    /**
     * Sorts the given list of card tuples first by suit, then by rank, both in
     * descending order. This allows ranking hands where suits and ranks matter.
     */
    private function sortCards($cards)
    {
        usort($cards, function ($a, $b) {
            $rankComparison = self::RANKS[$b[0]] - self::RANKS[$a[0]];
            $suitComparison = self::SUITS[$b[1]] - self::SUITS[$a[1]];

            return $rankComparison !== 0 ? $rankComparison : $suitComparison;
        });

        return $cards;
    }

    private function checkStraightFlush($cards): ?array
    {
        $flush = $this->getFlush($cards);
        if (!$flush) {
            return null;
        }

        $straightFlush = $this->checkStraight($flush);
        if (!$straightFlush) {
            return null;
        }

        return $straightFlush;
    }

    private function checkFourOfAKind($cards): ?array
    {
        $rankCounts = array_count_values(array_column($cards, 0));
        foreach ($rankCounts as $rank => $count) {
            if ($count == 4) {
                $kicker = array_filter($cards, function ($card) use ($rank) {
                    return (string) $rank !== $card[0];
                });

                return array_merge(array_filter($cards, function ($card) use ($rank) {
                    return (string) $rank === $card[0];
                }), array_slice($kicker, 0, 1));
            }
        }

        return null;
    }

    private function checkFullHouse($cards): ?array
    {
        $rankCounts = array_count_values(array_column($cards, 0));
        $threeOfAKind = null;
        $pair = null;

        foreach ($rankCounts as $rank => $count) {
            if ($count == 3) {
                $threeOfAKind = array_filter($cards, function ($card) use ($rank) {
                    return (string) $rank === $card[0];
                });
            } elseif ($count == 2) {
                $pair = array_filter($cards, function ($card) use ($rank) {
                    return (string) $rank === $card[0];
                });
            }
        }

        if (!($threeOfAKind && $pair)) {
            return null;
        }

        return array_merge($threeOfAKind, $pair);
    }

    private function getFlush($cards): ?array
    {
        $suit_counts = array_count_values(array_column($cards, 1));
        foreach ($suit_counts as $suit => $count) {
            if ($count >= 5) {
                return array_filter($cards, function ($card) use ($suit) {
                    return $suit === $card[1];
                });
            }
        }

        return null;
    }

    private function checkFlush($cards): ?array
    {
        $flush = $this->getFlush($cards);

        return $flush ? array_slice($flush, -5) : null;
    }

    /**
     * Checks if the given cards form a straight.
     * Iterates through all 5 card combinations, joins the ranks, and checks if
     * the straight pattern exists in the rank keys. Handles special case of
     * wheel straight. Returns the 5 card straight hand if found, else null.
     */
    private function checkStraight($cards): ?array
    {
        $ranks = array_column($cards, 0);
        for ($i = 0; $i < count($cards) - 4; ++$i) {
            if (str_contains(
                implode('', array_keys(self::RANKS)),
                implode('', array_slice($ranks, $i, 5))
            )) {
                return array_slice($cards, $i, 5);
            }
        }

        if (str_contains(implode('', $ranks), '5432') && $cards[0][0] == 'A') {
            return array_merge(array_slice($cards, -4), [$cards[0]]);
        }

        return null;
    }

    private function checkThreeOfAKind($cards): ?array
    {
        $rankCounts = array_count_values(array_column($cards, 0));
        foreach ($rankCounts as $rank => $count) {
            if ($count == 3) {
                $threeOfAKind = array_filter($cards, function ($card) use ($rank) {
                    return (string) $rank === $card[0];
                });

                $kicker = array_filter($cards, function ($card) use ($rank) {
                    return (string) $rank !== $card[0];
                });

                return array_merge($threeOfAKind, array_slice($kicker, 0, 2));
            }
        }

        return null;
    }

    private function checkTwoPair($cards): ?array
    {
        $rankCounts = array_count_values(array_column($cards, 0));
        $pairs = array_keys(array_filter($rankCounts, function ($count) {
            return $count == 2;
        }));

        if (count($pairs) < 2) {
            return null;
        }

        $high_pair = array_filter($cards, function ($card) use ($pairs) {
            return $card[0] === (string) $pairs[0];
        });
        $low_pair = array_filter($cards, function ($card) use ($pairs) {
            return $card[0] === (string) $pairs[1];
        });
        $kicker = array_filter($cards, function ($card) use ($pairs) {
            return !in_array($card[0], $pairs);
        });

        return array_merge($high_pair, $low_pair, [$kicker[0]]);
    }

    private function checkOnePair($cards): ?array
    {
        $rankCounts = array_count_values(array_column($cards, 0));
        foreach ($rankCounts as $rank => $count) {
            if ($count == 2) {
                $pair = array_filter($cards, function ($card) use ($rank) {
                    return (string) $rank === $card[0];
                });
                $kicker = array_filter($cards, function ($card) use ($rank) {
                    return (string) $rank !== $card[0];
                });

                return array_merge($pair, array_slice($kicker, 0, 3));
            }
        }

        return null;
    }

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function getHand(): ?array
    {
        return $this->hand;
    }
}
