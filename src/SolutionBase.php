<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode;

abstract class SolutionBase
{

    /**
     * Get the result for the first task.
     *
     * @param array $data
     * @return int
     */
    abstract public function getTaskA(array $data): int;

    /**
     * Get the result for the second task.
     *
     * @param array $data
     * @return int
     */
    abstract public function getTaskB(array $data): int;

    /**
     * Runs both tasks.
     *
     * @param string $input
     * @return array
     */
    public function getSolution(string $input): array
    {
        $data = $this->parseFile($input);

        return [
            'taskA' => $this->getTaskA($data),
            'taskB' => $this->getTaskB($data),
        ];
    }

    /**
     * Parse the input file for later calculations.
     *
     * @param string $input
     * @return array
     */
    protected function parseFile(string $input): array
    {
        return file($input, FILE_IGNORE_NEW_LINES);
    }
}
