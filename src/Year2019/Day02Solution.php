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
        $executedData = $this->executeIntcodeProgram($data);

        return $executedData[0];
    }

    public function getTaskB(array $data): ?int
    {
        for ($noun = 0; $noun < 100; $noun++) {
            for ($verb = 0; $verb < 100; $verb++) {
                $data[1] = $noun;
                $data[2] = $verb;

                $result = $this->executeIntcodeProgram($data);

                if ($result[0] === 19690720) {
                    return 100 * $noun + $verb;
                }
            }
        }

        return null;
    }

    public function executeIntcodeProgram(array $data): array
    {
        $i = 0;
        while (true) {
            $opCode = (int) $data[$i];
            if ($opCode === 99) {
                break;
            }

            $leftNumberPosition = $data[$i + 1];
            $rightNumberPosition = $data[$i + 2];
            $solutionPosition = $data[$i + 3];

            switch ($opCode) {
                case 1:
                    $data[$solutionPosition] = $data[$leftNumberPosition] + $data[$rightNumberPosition];
                    break;
                case 2:
                    $data[$solutionPosition] = $data[$leftNumberPosition] * $data[$rightNumberPosition];
                    break;
            }

            $i += 4;
        }

        return $data;
    }
}
