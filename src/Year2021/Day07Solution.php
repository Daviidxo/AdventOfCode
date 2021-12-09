<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day07Solution extends SolutionBase
{
    /**
     * {@inheritdoc}
     */
    protected function parseFile(string $input): array
    {
        $file = file($input, FILE_IGNORE_NEW_LINES);

        return explode(',', $file[0]);
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $median = $this->getMedian($data);

        $fuel = 0;
        foreach ($data as $pos) {
            $fuel += abs($pos - $median);
        }

        return $fuel;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $average = $this->getAverage($data);

        $fuel = 0;
        foreach ($data as $pos) {
            $toMove = abs($pos - $average);
            $fuel += gmp_intval(gmp_binomial($toMove + 1, 2));
        }

        return $fuel;
    }

    protected function getMedian(array $data): int {
        sort($data);
        $count = count($data);

        return $count % 2 === 0
            ? $data[$count / 2]
            : ($data[floor($count / 2)] + $data[ceil($count / 2)]) / 2;
    }

    protected function getAverage(array $data): int {
        return (int) floor(array_sum($data) / count($data));
    }
}
