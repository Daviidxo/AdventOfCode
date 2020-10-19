<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2019;

use Daviidxo\AdventOfCode\SolutionBase;

class Day04Solution extends SolutionBase
{
    public function getSolution(string $input): array
    {
        $data = explode('-', file_get_contents($input));
        $min = (int) $data[0];
        $max = (int) $data[1];

        return [
            'taskA' => $this->getTaskA($min, $max),
            'taskB' => $this->getTaskB($min, $max),
        ];
    }

    public function getTaskA(int $min, int $max): int
    {
        $possibilities = 0;

        for ($i = $min; $i <= $max; $i++) {
            $possibilities += $this->isNumberPossible($i);
        }

        return $possibilities;
    }

    public function getTaskB(int $min, int $max): Int
    {
        $possibilities = 0;

        for ($i = $min; $i <= $max; $i++) {
            $possibilities += $this->isNumberPossible($i, true);
        }

        return $possibilities;
    }

    public function isNumberPossible(int $number, bool $sameTwoNeeded = false): bool
    {
        $numbers = str_split((string) $number);
        $digits = count($numbers);

        if ($digits !== 6) {
            throw new \Exception('Number out of range');
        }

        for ($j = 0; $j < $digits - 1; $j++) {
            if ($numbers[$j] > $numbers[$j + 1]) {
                return false;
            }
        }

        for ($j = 0; $j < $digits - 1; $j++) {
            if ($numbers[$j] === $numbers[$j + 1]) {
                break;
            }

            if ($j === $digits - 2) {
                return false;
            }
        }

        return $sameTwoNeeded ? $this->isSameNumberTwice($numbers) : true;
    }

    public function isSameNumberTwice(array $numbers): bool
    {
        $count = array_count_values($numbers);
        foreach (array_values($count) as $num) {
            if ($num === 2) {
                return true;
            }
        }

        return false;
    }
}
