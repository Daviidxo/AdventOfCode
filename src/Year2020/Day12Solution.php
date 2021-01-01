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
            $action = $this->parseAction($move);

            switch ($action['dir']) {
                case 'N':
                case 'E':
                case 'S':
                case 'W':
                    $moved['N'] += $action['amount'] * $this->moveSet[$action['dir']][0];
                    $moved['E'] += $action['amount'] * $this->moveSet[$action['dir']][1];
                    break;
                case 'L':
                case 'R':
                    $turn = $action['dir'] === 'R' ? 90 : -90;
                    $facingPos = array_search($facing, $this->compass);
                    $changeInNum = $action['amount'] / $turn;
                    $pos = $facingPos + $changeInNum;
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
                    $moved['N'] += $action['amount'] * $this->moveSet[$facing][0];
                    $moved['E'] += $action['amount'] * $this->moveSet[$facing][1];
                    break;
            }
        }

        return abs($moved['E']) + abs($moved['N']);
    }

    public function parseAction(string $move): array
    {
        $action = [];
        preg_match('/(N|E|S|W|L|R|F)(\d+)/', $move, $action);

        return [
            'dir' => $action[1],
            'amount' => $action[2],
        ];
    }

    public function getTaskB(array $data): int
    {
        $waypointPosition = [
            'E' => 10,
            'N' => 1,
        ];

        $shipPosition = [
            'E' => 0,
            'N' => 0,
        ];

        foreach ($data as $move) {
            $action = $this->parseAction($move);

            switch ($action['dir']) {
                case 'N':
                case 'E':
                case 'S':
                case 'W':
                    $waypointPosition['E'] += $action['amount'] * $this->moveSet[$action['dir']][1];
                    $waypointPosition['N'] += $action['amount'] * $this->moveSet[$action['dir']][0];
                    break;
                case 'L':
                case 'R':
                    $turn = $action['dir'] === 'R' ? -1 : 1;
                    $degrees = $action['amount'] * $turn;
                    $radians = deg2rad($degrees);

                    $newE = (int) round(
                        ($waypointPosition['E'] * cos($radians) - $waypointPosition['N'] * sin($radians))
                    );
                    $newN = (int) round(
                        ($waypointPosition['N'] * cos($radians) + $waypointPosition['E'] * sin($radians))
                    );
                    $waypointPosition['E'] = $newE;
                    $waypointPosition['N'] = $newN;
                    break;
                case 'F':
                    $shipPosition['E'] += $action['amount'] * $waypointPosition['E'];
                    $shipPosition['N'] += $action['amount'] * $waypointPosition['N'];
                    break;
            }
        }

        return abs($shipPosition['E']) + abs($shipPosition['N']);
    }

}
