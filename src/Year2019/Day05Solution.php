<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2019;

use Daviidxo\AdventOfCode\SolutionBase;

class Day05Solution extends SolutionBase
{
    /**
     * {@inheritdoc}
     */
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
        $intcodeMachine = new IntcodeComputer();

        return $intcodeMachine->execute($data, 1)['outputs'];
    }

    public function getTaskB(array $data): int
    {
        $intcodeMachine = new IntcodeComputer();

        return $intcodeMachine->execute($data, 5)['outputs'];
    }
}
