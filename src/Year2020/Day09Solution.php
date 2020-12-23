<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2020;

use Daviidxo\AdventOfCode\SolutionBase;

class Day09Solution extends SolutionBase
{
    public function getTaskA(array $data): int
    {
        $preambleLength = 25;

        return $this->getFirstInvalid($data, $preambleLength);
    }

    public function getFirstInvalid(array $data, int $preambleLength): ?int
    {
        for ($i = $preambleLength; $i < count($data); $i++) {
            $numbersBefore = array_slice($data, $i - $preambleLength, $preambleLength);
            if (!$this->isNumberValid((int) $data[$i], $numbersBefore)) {
                return (int) $data[$i];
            }
        }

        return null;
    }

    public function isNumberValid(int $number, array $numbersBefore): bool
    {
        for ($i = 0; $i < count($numbersBefore) - 1; $i++) {
            for ($j = 1; $j < count($numbersBefore); $j++) {
                if ($numbersBefore[$i] + $numbersBefore[$j] === $number) {
                    return true;
                }
            }
        }

        return false;
    }

    public function getTaskB(array $data): int
    {
        $firstInvalid = $this->getTaskA($data);

        $i = 0;
        $set = [];
        $currentSum = 0;

        while ($currentSum !== $firstInvalid) {
            $currentSum += $data[$i];
            $set[] = $data[$i];
            for ($j = $i + 1; $j < count($data); $j++) {
                $currentSum += $data[$j];

                if ($currentSum === $firstInvalid) {
                    $set[] = $data[$j];
                    break;
                }

                if ($currentSum > $firstInvalid) {
                    $set = [];
                    $currentSum = 0;
                    $i++;

                    break;
                }

                $set[] = $data[$j];
            }
        }

        return min($set) + max($set);
    }
}
