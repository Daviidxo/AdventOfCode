<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day06Solution extends SolutionBase
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
        $fish = array_fill(0, 9, 0);
        foreach ($data as $f) {
            $fish[$f]++;
        }

        for ($i = 0; $i < 80; $i++) {
            $this->iterateFish($fish);
        }

        return array_sum($fish);
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $fish = array_fill(0, 9, 0);
        foreach ($data as $f) {
            $fish[$f]++;
        }

        for ($i = 0; $i < 256; $i++) {
            $this->iterateFish($fish);
        }

        return array_sum($fish);
    }

    protected function iterateFish(array &$fish)
    {
        $born = reset($fish);
        unset($fish[0]);
        $fish = array_values($fish);
        $fish[6] += $born;
        $fish[8] = $born;
    }
}
