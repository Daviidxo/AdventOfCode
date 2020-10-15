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
        $manhattans = [];
        $intersections = $this->getIntersections($wires)['intersections'];

        foreach ($intersections as $intersection) {
            $manhattans[] = abs($intersection[0]) + abs($intersection[1]);
        }

        return min($manhattans);
    }

    public function getTaskB(array $wires): int
    {
        $data = $this->getIntersections($wires);
        $panel = $data['panel'];
        $intersections = $data['intersections'];

        $calculatedSteps = [];

        foreach ($intersections as $intersection) {
            $calculatedSteps[] =
                $panel[$intersection[0]][$intersection[1]]['steps0']
                + $panel[$intersection[0]][$intersection[1]]['steps1'];
        }

        return min($calculatedSteps);
    }

    public function getIntersections($wires): array
    {
        $panel = [];
        $xMoves = ['R' => 1, 'L' => -1, 'U' => 0, 'D' => 0];
        $yMoves = ['R' => 0, 'L' => 0, 'U' => 1, 'D' => -1];

        $intersections = [];

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

                    if (isset($panel[$posX][$posY])
                        && $panel[$posX][$posY]['wireId'] !== $id
                        && $panel[$posX][$posY]['intersection'] !== true
                    ) {
                        $intersections[] = [$posX, $posY];
                        $panel[$posX][$posY]['intersection'] = true;
                        $panel[$posX][$posY]['steps' . $id] = ++$steps;
                        $panel[$posX][$posY]['wireId'] = $id;

                        continue;
                    }

                    $panel[$posX][$posY] = [
                        'steps' . $id => ++$steps,
                        'wireId' => $id,
                        'intersection' => false,
                    ];
                }
            }
        }

        return [
            'intersections' => $intersections,
            'panel' => $panel,
        ];
    }
}
