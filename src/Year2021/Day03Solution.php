<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day03Solution extends SolutionBase
{
    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $gammaRate = '';
        $epsilonRate = '';

        if (!$data) {
            return 0;
        }


        for ($i = 0; $i < strlen($data[0]); $i++) {
            $mostCommonBit = $this->getMostCommonBit($data, $i);

            $gammaRate .= $mostCommonBit;
            $epsilonRate .= (int) !$mostCommonBit;
        }

        return bindec($gammaRate) * bindec($epsilonRate);
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        if (!$data) {
            return 0;
        }

        return $this->getRating($data) * $this->getRating($data, false);
    }

    public function getMostCommonBit(array $rows, int $col): int
    {
        $rowCount = count($rows);

        $ones = 0;
        for ($j = 0; $j < $rowCount; $j++) {
            $ones += $rows[$j][$col];
        }

        return (int) $ones >= $rowCount / 2;
    }

    public function getRating(array $rows, bool $mostCommon = true): int
    {
        $rowsCopy = $rows;
        for ($i = 0; $i < strlen($rows[0]); $i++) {
            if (count($rowsCopy) === 1) {
                break;
            }
            $mostCommonBit = $this->getMostCommonBit($rows, $i);

            for ($j = 0; $j < count($rows); $j++) {
                if ($rows[$j][$i] == ($mostCommon ? $mostCommonBit : (int) !$mostCommonBit)) {
                    continue;
                }

                unset($rowsCopy[$j]);
            }
            $rowsCopy = array_values($rowsCopy);
            $rows = $rowsCopy;
        }

        return bindec(reset($rowsCopy));
    }
}
