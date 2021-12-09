<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day05Solution extends SolutionBase
{
    /**
     * {@inheritdoc}
     */
    protected function parseFile(string $input): array
    {
        $data = [];
        $file = file($input, FILE_IGNORE_NEW_LINES);
        foreach ($file as $row) {
            $minMax = explode(' -> ', $row);
            $min = explode(',', $minMax[0]);
            $max = explode(',', $minMax[1]);
            $data[] = [
                'x1' => $min[0],
                'y1' => $min[1],
                'x2' => $max[0],
                'y2' => $max[1],
            ];
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $map = $this->createMap($data);
        $this->fillMap($data, $map);

        return $this->countOverlaps($map);
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $map = $this->createMap($data);
        $this->fillMap($data, $map, true);

        return $this->countOverlaps($map);
    }

    protected function createMap(array $data): array
    {
        $maxX1 = $this->getMax($data, 'x1');
        $maxX2 = $this->getMax($data, 'x2');
        $maxY1 = $this->getMax($data, 'y1');
        $maxY2 = $this->getMax($data, 'y2');
        $maxX = $maxX1 > $maxX2 ? $maxX1 : $maxX2;
        $maxY = $maxY1 > $maxY2 ? $maxY1 : $maxY2;

        $map = [];
        for ($i = 0; $i <= $maxY; $i++) {
            $map[] = array_fill(0, $maxX + 1, 0);
        }
        return $map;
    }

    protected function getMax(array $data, string $key): int
    {
        $max = 0;
        foreach ($data as $row) {
            $max = $row[$key] > $max ? $row[$key] : $max;
        }

        return $max;
    }

    protected function fillMap(array $data, array &$map, bool $withDiagonals = false): void
    {
        if ($withDiagonals) {
            $coords = $this->getCoordinates($data);
            foreach ($coords as $coord) {
                $map[$coord[1]][$coord[0]]++;
            }

            return;
        }

        foreach ($data as $row) {
            if ($row['x1'] === $row['x2']) {
                if ($row['y1'] < $row['y2']) {
                    for ($i = $row['y1']; $i <= $row['y2']; $i++) {
                        $map[$i][$row['x1']]++;
                    }

                    continue;
                }

                for ($i = $row['y2']; $i <= $row['y1']; $i++) {
                    $map[$i][$row['x1']]++;
                }

                continue;
            }
            if ($row['y1'] === $row['y2']) {
                if ($row['x1'] < $row['x2']) {
                    for ($i = $row['x1']; $i <= $row['x2']; $i++) {
                        $map[$row['y1']][$i]++;
                    }

                    continue;
                }

                for ($i = $row['x2']; $i <= $row['x1']; $i++) {
                    $map[$row['y1']][$i]++;
                }
            }
        }
    }

    protected function getCoordinates(array $data)
    {
        $coords = [];
        foreach ($data as $row) {
            if ($row['x1'] < $row['x2']) {
                for ($xi = $row['x1']; $xi < $row['x2'] + 1; $xi++) {
                    $yi = ($row['y2'] - $row['y1']) / ($row['x2'] - $row['x1']) * ($xi - $row['x1']) + $row['y1'];
                    $coords[] = [$xi, $yi];
                }
            }
            if ($row['x1'] > $row['x2']) {
                for ($xi = $row['x2']; $xi < $row['x1'] + 1; $xi++) {
                    $yi = ($row['y2'] - $row['y1']) / ($row['x2'] - $row['x1']) * ($xi - $row['x1']) + $row['y1'];
                    $coords[] = [$xi, $yi];
                }
            }
            if ($row['x1'] === $row['x2']) {
                if ($row['y1'] < $row['y2']) {
                    for ($yi = $row['y1']; $yi < $row['y2'] + 1; $yi++) {
                        $coords[] = [$row['x1'], $yi];
                    }
                }
                if ($row['y1'] > $row['y2']) {
                    for ($yi = $row['y2']; $yi < $row['y1'] + 1; $yi++) {
                        $coords[] = [$row['x1'], $yi];
                    }
                }
            }
        }

        return $coords;
    }

    protected function countOverlaps(array $map): int
    {
        $count = 0;

        foreach ($map as $row) {
            foreach ($row as $value) {
                if ($value > 1) {
                    $count++;
                }
            }
        }

        return $count;
    }
}
