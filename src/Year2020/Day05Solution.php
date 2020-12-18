<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2020;

use Daviidxo\AdventOfCode\SolutionBase;

class Day05Solution extends SolutionBase
{
    /**
     * {@inheritdoc}
     */
    public function getSolution(string $input): array
    {
        $data = file($input, FILE_IGNORE_NEW_LINES);

        return [
            'taskA' => $this->getTaskA($data),
            'taskB' => $this->getTaskB($data),
        ];
    }

    public function getTaskA(array $data): int
    {
        $seatIds = [];
        foreach ($data as $boardingPass) {
            $seatIds[] = $this->getSeatId($boardingPass);
        }

        return max($seatIds);
    }

    public function getSeatId(string $boardingPass): int
    {
        $rows = substr($boardingPass, 0, 7);
        $cols = substr($boardingPass, -3);

        $rowId = $this->getId($rows, 0, 127);
        $colId = $this->getId($cols, 0, 7);

        return $rowId * 8 + $colId;
    }

    public function getId(string $values, int $min, int $max): int
    {
        $chars = str_split($values);

        foreach ($chars as $i => $row) {
            switch ($row) {
                case 'F':
                case 'L':
                    if ($i === array_key_last($chars)) {
                        return (int) $min;
                    }

                    $max = floor(($min + $max) / 2);
                    break;
                case 'B':
                case 'R':
                    if ($i === array_key_last($chars)) {
                        return (int) $max;
                    }

                    $min = ceil(($min + $max) / 2);
                    break;
            }
        }

        return 0;
    }

    public function getTaskB(array $data): int
    {
        $seatIds = [];
        foreach ($data as $boardingPass) {
            $seatIds[] = $this->getSeatId($boardingPass);
        }

        sort($seatIds);

        foreach ($seatIds as $i => $seatId) {
            if (isset($seatIds[$i + 1])
                && $seatIds[$i + 1] === $seatId + 2
            ) {
                return $seatId + 1;
            }
        }

        return 0;
    }
}
