<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2020;

use Daviidxo\AdventOfCode\SolutionBase;

class Day12Solution extends SolutionBase
{

    protected $compass = [
        'N',
        'E',
        'S',
        'W',
    ];

    protected $moveSet = [
        'N' => [1, 0],
        'E' => [0, 1],
        'S' => [-1, 0],
        'W' => [0, -1],
    ];

    public function getTaskA(array $data): int
    {
        $facing = 'E';
        $moved = [
            'E' => 0,
            'N' => 0,
        ];

        foreach ($data as $move) {
            $action = [];
            preg_match('/(N|E|S|W|L|R|F)(\d+)/', $move, $action);
            $dir = $action[1];
            $amount = $action[2];

            switch ($dir) {
                case 'N':
                case 'E':
                case 'S':
                case 'W':
                    $moved['N'] += $amount * $this->moveSet[$dir][0];
                    $moved['E'] += $amount * $this->moveSet[$dir][1];
                    break;
                case 'L':
                case 'R':
                    $turn = $dir === 'R' ? 90 : -90;
                    $facingPos = array_search($facing, $this->compass);
                    $changeInNum = $amount / $turn;
                    $pos = $facingPos + $changeInNum;
                    var_dump($pos);
                    if (!isset($this->compass[$pos])) {
                        if ($pos < 0) {
                            $pos += 4;
                        } elseif ($pos > 3) {
                            $pos -= 4;
                        }
                    }

                    $facing = $this->compass[$pos];
                    break;
                case 'F':
                    $moved['N'] += $amount * $this->moveSet[$facing][0];
                    $moved['E'] += $amount * $this->moveSet[$facing][1];
                    break;
            }
        }

        return abs($moved['E']) + abs($moved['N']);
    }

    public function getTaskB(array $data): int
    {
        return 0;
    }

}
