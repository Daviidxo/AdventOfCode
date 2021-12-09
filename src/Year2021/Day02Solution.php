<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day02Solution extends SolutionBase
{

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $pos = [
            'horizontal' => 0,
            'depth' => 0,
        ];

        foreach ($data as $command) {
            $commandParts = explode(' ', $command);
            switch ($commandParts[0]) {
                case 'forward':
                    $pos['horizontal'] += $commandParts[1];
                    break;
                case 'up':
                    $pos['depth'] -= $commandParts[1];
                    break;
                case 'down':
                    $pos['depth'] += $commandParts[1];
                    break;
            }
        }

        return $pos['horizontal'] * $pos['depth'];
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $pos = [
            'horizontal' => 0,
            'depth' => 0,
            'aim' => 0,
        ];

        foreach ($data as $command) {
            $commandParts = explode(' ', $command);
            switch ($commandParts[0]) {
                case 'forward':
                    $pos['horizontal'] += $commandParts[1];
                    $pos['depth'] += $pos['aim'] * $commandParts[1];
                    break;
                case 'up':
                    $pos['aim'] -= $commandParts[1];
                    break;
                case 'down':
                    $pos['aim'] += $commandParts[1];
                    break;
            }
        }

        return $pos['horizontal'] * $pos['depth'];
    }
}
