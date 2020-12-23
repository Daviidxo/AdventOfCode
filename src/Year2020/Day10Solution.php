<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2020;

use Daviidxo\AdventOfCode\SolutionBase;

class Day10Solution extends SolutionBase
{
    public function getTaskA(array $data): int
    {
        sort($data, SORT_NUMERIC);

        $differences = [
            1 => 0,
            2 => 0,
            3 => 0,
        ];

        $differences[$data[0]]++;

        for ($i = 0; $i < count($data) - 1; $i++) {
            $difference = $data[$i + 1] - $data[$i];
            $differences[$difference]++;
        }

        $differences[3]++;

        return $differences[1] * $differences[3];
    }

    public function getTaskB(array $data): int
    {
        sort($data, SORT_NUMERIC);

        $highest = $data[array_key_last($data)];
        array_push($data, $highest+3); // append the device adapter to the list

        $storage = [];
        return $this->findCombinations(0, $data, (int) $highest, $storage);
    }

    public function findCombinations(
        int $currentEnd,
        array $adapters,
        int $highest,
        array &$storage
    ): int {
        if ($currentEnd === $highest) {
            return 1;
        }
        $count = 0;

        for ($i = 1; $i < 4; $i++) {
            $check = $currentEnd + $i;

            if (in_array($check, $adapters)) {
                $remaining = array_filter($adapters, function ($val) use ($check) {
                    return $val > $check;
                });

                if (!isset($storage[$check])) {
                    $storage[$check] = $this->findCombinations(
                        $check,
                        $remaining,
                        $highest,
                        $storage
                    );
                }
                $count += $storage[$check];
            }
        }

        return $count;
    }

}
