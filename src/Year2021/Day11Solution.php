<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day11Solution extends SolutionBase
{

    protected array $positions = [
        [-1, -1],
        [-1, 0],
        [-1, 1],
        [0, -1],
        [0, 1],
        [1, -1],
        [1, 0],
        [1, 1],
    ];

    protected array $didFlash = [];

    /**
     * {@inheritdoc}
     */
    protected function parseFile(string $input): array
    {
        $file = parent::parseFile($input);

        $data = [];
        foreach ($file as $line) {
            $data[] = str_split($line);
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $flashCount = 0;
        for ($steps = 0; $steps < 100; $steps++) {
            $this->iterateOctopuses($data);

            foreach ($this->didFlash as $row) {
                foreach ($row as $didFlash) {
                    $flashCount += (int) $didFlash;
                }
            }

            $this->didFlash = [];
        }

        return $flashCount;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $size = 0;
        foreach ($data as $row) {
            $size += count($row);
        }

        $step = 0;
        while (true) {
            $flashCount = 0;

            $this->iterateOctopuses($data);

            foreach ($this->didFlash as $row) {
                foreach ($row as $didFlash) {
                    $flashCount += (int) $didFlash;
                }
            }

            $this->didFlash = [];

            if ($flashCount === $size) {
                return $step + 1;
            }

            $step++;
        }
    }

    protected function iterateOctopuses(array &$data)
    {
        foreach ($data as $row) {
            $this->didFlash[] = array_fill(0, count($row), false);
        }

        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data[$i]); $j++) {
                if ($this->didFlash[$i][$j]) {
                    continue;
                }

                if ($this->shouldFlash(++$data[$i][$j])) {
                    $this->flashOctopus($data, $i, $j);
                }
            }
        }
    }

    protected function flashOctopus(&$data, int $i, int $j, int $flashCount = 0)
    {
        $data[$i][$j] = 0;
        $this->didFlash[$i][$j] = true;
        foreach ($this->positions as $position) {
            $pos = [
                $i + $position[0],
                $j + $position[1],
            ];

            if (!isset($data[$pos[0]][$pos[1]])) {
                continue;
            }

            if ($this->didFlash[$pos[0]][$pos[1]]) {
                continue;
            }

            if ($this->shouldFlash(++$data[$pos[0]][$pos[1]])) {
                $this->flashOctopus($data, $pos[0], $pos[1], $flashCount);
            }
        }
    }

    protected function shouldFlash(int $num): bool
    {
        return $num > 9;
    }
}
