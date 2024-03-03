<?php

namespace Daviidxo\AdventOfCode\Year2022;

use Daviidxo\AdventOfCode\SolutionBase;

class Day03Solution extends SolutionBase
{
    protected int $lowerCharCodeOffset = -96;
    protected int $upperCharCodeOffset = -38;

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $sum = 0;

        foreach ($data as $row) {
            $common = $this->getCommonItem(str_split($row));
            $sum += $this->getCodeFromChar($common);
        }

        return $sum;
    }

    /**
     * Get common item in backpack
     *
     * @param array $items
     * @return mixed|void
     */
    protected function getCommonItem(array $items): string
    {
        $len = count($items);
        $half = $len / 2;
        $first = array_slice($items, 0, $half);
        $second = array_slice($items, $half);
        foreach ($first as $item) {
            if (!in_array($item, $second)) {
                continue;
            }

            return $item;
        }
    }

    /**
     * Get the code for each char with offset value added.
     *
     * @param string $char
     * @return int
     */
    protected function getCodeFromChar(string $char): int
    {
        $isLower = $char === mb_strtolower($char);
        $offset = $isLower ? $this->lowerCharCodeOffset : $this->upperCharCodeOffset;

        return ord($char) + $offset;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $i = 0;
        while (isset($row[$i])) {
            foreach ($data as $row) {
                $commonItems = [];
                for ($j = 0; $j < 3; $j++) {
                    $currentRow = $data[$j] ?? [];
                    foreach ($currentRow as $item) {
                        isset($commonItems[$item]) ? $commonItems[$item]++ : $commonItems[$item] = 0;
                    }
                }
            }
        }

        return 0;
    }
}
