<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day01Solution extends SolutionBase
{

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $increased = 0;
        for ($i = 1; $i < count($data); $i++) {
            if (!isset($data[$i - 1])) {
                continue;
            }

            $increased += $data[$i] - $data[$i - 1] > 0 ? 1 : 0;
        }

        return $increased;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $increased = 0;
        for ($i = 0; $i < count($data); $i++) {
            if (!isset($data[$i + 3])) {
                break;
            }

            $firstSum = $data[$i] + $data[$i + 1] + $data[$i + 2];
            $secondSum = $data[$i + 1] + $data[$i + 2] + $data[$i + 3];

            $increased += $secondSum - $firstSum > 0 ? 1 : 0;
        }

        return $increased;
    }
}
