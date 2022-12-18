<?php

namespace Daviidxo\AdventOfCode\Year2022;
use Daviidxo\AdventOfCode\SolutionBase;

class Day01Solution extends SolutionBase
{
    /**
     * {@inheritdoc}
     */
    protected function parseFile(string $input): array
    {
        $contents = parent::parseFile($input);

        $data = [];
        $i = 0;
        foreach ($contents as $row) {
            if (!$row) {
                $i++;
                continue;
            }

            $data[$i][] = $row;
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        return $this->getMaxWithRemove($data);
    }

    public function getMaxWithRemove(array &$data): int
    {
        $max = 0;
        $index = 0;
        foreach ($data as $i => $calories) {
            if (array_sum($calories) < $max) {
                continue;
            }
            $max = array_sum($calories);
            $index = $i;
        }

        unset($data[$index]);

        return $max;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $max = 0;
        for ($i = 0; $i < 3; $i++) {
            $max += $this->getMaxWithRemove($data);
        }

        return $max;
    }
}
