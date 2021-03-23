<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode;

abstract class SolutionBase
{
    abstract public function getTaskA(array $data): int;

    abstract public function getTaskB(array $data): int;

    public function getSolution(string $input): array
    {
        $data = $this->parseFile($input);

        return [
            'taskA' => $this->getTaskA($data),
            'taskB' => $this->getTaskB($data),
        ];
    }

    protected function parseFile(string $input): array
    {
        return file($input, FILE_IGNORE_NEW_LINES);
    }
}
