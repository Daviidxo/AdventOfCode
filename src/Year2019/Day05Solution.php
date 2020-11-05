<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2019;

use Daviidxo\AdventOfCode\SolutionBase;

class Day05Solution extends SolutionBase
{
    public function getSolution(string $input): array
    {
        $data = explode(',', file_get_contents($input));

        return [
            'taskA' => $this->getTaskA($data),
            'taskB' => 1,
        ];
    }

    public function getTaskA(array $data): int
    {


        (new IntcodeComputer())->execute($data);
        return $this->executeIntcodeProgram($data)[0];

    }
}
