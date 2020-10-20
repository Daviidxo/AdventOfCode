<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2019;

use Daviidxo\AdventOfCode\SolutionBase;

class Day03Solution extends SolutionBase
{
    /**
     * {@inheritdoc}
     */
    public function getSolution(string $input): array
    {
        $data = file($input, FILE_IGNORE_NEW_LINES);
        $wireA = explode(',', $data[0]);
        $wireB = explode(',', $data[1]);

        return [
            'taskA' => $this->getTaskA([$wireA, $wireB]),
            'taskB' => $this->getTaskB([$wireA, $wireB]),
        ];
    }

    public function getTaskA(array $wires): int
    {
        $panel = $this->getPanel($wires);
        $intersections = array_intersect_key($panel[0], $panel[1]);

        $manhattans = [];
        foreach ($intersections as $key => $intersection) {
            $positions = explode(',', $key);
            $manhattans[] = abs($positions[0]) + abs($positions[1]);
        }

        return min($manhattans);
    }

    public function getTaskB(array $wires): int
    {
        $panel = $this->getPanel($wires);
        $intersections = array_intersect_key($panel[0], $panel[1]);
        $posKeys = array_keys($intersections);

        $steps = [];
        foreach ($posKeys as $posKey) {
            $steps[] = $panel[0][$posKey] + $panel[1][$posKey];
        }

        return min($steps);
    }

    public function getPanel($wires): array
    {
        $panel = [];
        $xMoves = ['R' => 1, 'L' => -1, 'U' => 0, 'D' => 0];
        $yMoves = ['R' => 0, 'L' => 0, 'U' => 1, 'D' => -1];

        foreach ($wires as $id => $wire) {
            $posX = 0;
            $posY = 0;
            $steps = 0;

            foreach ($wire as $dir) {
                $direction = substr($dir, 0, 1);
                $distance = (int) substr($dir, 1);
                for ($i = 0; $i < $distance; $i++) {
                    $posX += $xMoves[$direction];
                    $posY += $yMoves[$direction];

                    $panel[$id][$posX . ',' . $posY] = ++$steps;
                }
            }
        }

        return $panel;
    }
}
