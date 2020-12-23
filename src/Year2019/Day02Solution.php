<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2019;

use Daviidxo\AdventOfCode\SolutionBase;

class Day02Solution extends SolutionBase
{
    public function getSolution(string $input): array
    {
        $data = explode(',', file_get_contents($input));

        return [
            'taskA' => $this->getTaskA($data),
            'taskB' => $this->getTaskB($data),
        ];
    }

    public function getTaskA(array $data): int
    {
        $data[1] = 12;
        $data[2] = 2;
        $executedData = (new IntcodeComputer())->execute($data)['data'];

        return $executedData[0];
    }

    public function getTaskB(array $data): int
    {
        for ($noun = 0; $noun < 100; $noun++) {
            for ($verb = 0; $verb < 100; $verb++) {
                $data[1] = $noun;
                $data[2] = $verb;

                $result = (new IntcodeComputer())->execute($data)['data'];

                if ($result[0] === 19690720) {
                    return 100 * $noun + $verb;
                }
            }
        }

        return 0;
    }
}
