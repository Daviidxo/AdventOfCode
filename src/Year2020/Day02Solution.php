<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2020;

use Daviidxo\AdventOfCode\SolutionBase;

class Day02Solution extends SolutionBase
{
    public function getTaskA(array $input): int
    {
        $valid = 0;
        foreach ($input as $passwordData) {
            $parsed = $this->parsePasswordData($passwordData);
            $valid += (int) $this->isPasswordValid(
                $parsed['left'],
                $parsed['right'],
                $parsed['char'],
                $parsed['pass'],
            );
        }

        return $valid;
    }

    public function getTaskB(array $input): int
    {
        $valid = 0;
        foreach ($input as $passwordData) {
            $parsed = $this->parsePasswordData($passwordData);
            $valid += (int) $this->isPasswordValidNew(
                $parsed['left'],
                $parsed['right'],
                $parsed['char'],
                $parsed['pass'],
            );
        }

        return $valid;
    }

    public function parsePasswordData(string $passwordData): array
    {
        $matches = null;
        preg_match_all('/(\d+)-(\d+) (.): (.+)/', $passwordData, $matches);

        return [
            'left' => (int) $matches[1][0],
            'right' => (int) $matches[2][0],
            'char' => $matches[3][0],
            'pass' => $matches[4][0],
        ];
    }

    public function isPasswordValid(int $min, int $max, string $char, string $password): bool
    {
        $values = array_count_values(str_split($password));
        if (!isset($values[$char])) {
            return false;
        }

        return $values[$char] >= $min && $values[$char] <= $max;
    }

    public function isPasswordValidNew(int $first, int $second, string $char, string $password): bool
    {
        $values = str_split($password);

        return (bool) (($values[$first - 1] === $char) ^ ($values[$second - 1] === $char));
    }
}
