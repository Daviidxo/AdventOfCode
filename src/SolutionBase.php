<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode;

abstract class SolutionBase
{
    abstract public function getSolution(string $input): array;

    abstract public function getTaskA(array $data): int;

    abstract public function getTaskB(array $data): int;
}
