<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2020;

use Daviidxo\AdventOfCode\SolutionBase;

class Day03Solution extends SolutionBase
{

    /**
     * {@inheritdoc}
     */
    public function getSolution(string $input): array
    {
        $data = file($input, FILE_IGNORE_NEW_LINES);

        return [
            'taskA' => $this->getTaskA($data),
            'taskB' => $this->getTaskB($data),
        ];
    }

    public function getTaskA(array $data): int
    {
        return $this->getTreesForSlopes($data, 3, 1);
    }

    public function getTaskB(array $data): int
    {
        return
            $this->getTreesForSlopes($data, 1, 1)
            * $this->getTreesForSlopes($data, 3, 1)
            * $this->getTreesForSlopes($data, 5, 1)
            * $this->getTreesForSlopes($data, 7, 1)
            * $this->getTreesForSlopes($data, 1, 2);
    }

    public function getTreesForSlopes(array $data, int $right, int $down): int
    {
        $trees = 0;
        $i = 0;
        $j = 0;

        while (isset($data[$i])) {
            $blocks = str_split($data[$i]);
            if ($j >= count($blocks)) {
                $j = $j - count($blocks);
            }

            $trees += (int) $this->isTree($blocks[$j]);
            $j += $right;
            $i += $down;
        }

        return $trees;
    }

    public function isTree(string $block): bool
    {
        return $block === '#';
    }
}
