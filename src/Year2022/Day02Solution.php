<?php

namespace Daviidxo\AdventOfCode\Year2022;

use Daviidxo\AdventOfCode\SolutionBase;

class Day02Solution extends SolutionBase
{

    protected array $handPoints = [
        'A' => 1,
        'B' => 2,
        'C' => 3,
        'X' => 1,
        'Y' => 2,
        'Z' => 3,
    ];

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $score = 0;

        $playMapping = [
            'A X' => 0,
            'A Y' => 1,
            'A Z' => -1,
            'B X' => -1,
            'B Y' => 0,
            'B Z' => 1,
            'C X' => 1,
            'C Y' => -1,
            'C Z' => 0,
        ];

        $pointsMapping = [
            -1 => 0,
            0 => 3,
            1 => 6,
        ];

        foreach ($data as $game) {
            $hands = explode(' ', $game);
            $yourHand = $hands[1];
            $score += $this->handPoints[$yourHand];
            $score += $pointsMapping[$playMapping[$game]];
        }

        return $score;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $score = 0;

        $chooseMapping = [
            'X' => [
                'A' => 'C',
                'B' => 'A',
                'C' => 'B',
            ],
            'Y' => [
                'A' => 'A',
                'B' => 'B',
                'C' => 'C',
            ],
            'Z' => [
                'A' => 'B',
                'B' => 'C',
                'C' => 'A',
            ],
        ];

        $outcomeMapping = [
            'X' => 0,
            'Y' => 3,
            'Z' => 6,
        ];

        foreach ($data as $game) {
            $hands = explode(' ', $game);
            $enemyHand = $hands[0];
            $outcome = $hands[1];
            $score += $outcomeMapping[$outcome];
            $score += $this->handPoints[$chooseMapping[$outcome][$enemyHand]];
        }

        return $score;
    }
}
