<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2020;

use Daviidxo\AdventOfCode\SolutionBase;

class Day01Solution extends SolutionBase
{
    public function getTaskA(array $input): int
    {
        for ($i = 0; $i < count($input) - 1; $i++) {
            for ($j = 1; $j < count($input); $j++) {
                if ($input[$i] + $input[$j] !== 2020) {
                    continue;
                }

                return $input[$i] * $input[$j];
            }
        }

        return 0;
    }

    public function getTaskB(array $input): int
    {
        for ($i = 0; $i < count($input) - 2; $i++) {
            for ($j = 1; $j < count($input) - 1; $j++) {
                for ($k = 2; $k < count($input); $k++) {
                    if ($input[$i] + $input[$j] + $input[$k] !== 2020) {
                        continue;
                    }

                    return $input[$i] * $input[$j]  * $input[$k];
                }
            }
        }

        return 0;
    }
}
