<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2020;

use Daviidxo\AdventOfCode\SolutionBase;

class Day06Solution extends SolutionBase
{
    protected function parseFile(string $input): array
    {
        $contents = file($input, FILE_IGNORE_NEW_LINES);
        $data = array_fill(0, count($contents), null);
        $index = 0;
        foreach ($contents as $line) {
            if (!$line) {
                $index++;
            }

            if (!$data[$index]) {
                $data[$index] = $line;

                continue;
            }

            $data[$index] .= "|$line";
        }

        return array_filter($data);
    }

    public function getTaskA(array $data): int
    {
        $count = 0;
        foreach ($data as $answers) {
            $groupAnswers = explode('|', $answers);
            $filtered = $this->filterData($groupAnswers);

            $count += count($filtered);
        }

        return $count;
    }

    public function filterData(array $groupAnswers): array
    {
        $filtered = [];

        foreach ($groupAnswers as $groupAnswer) {
            $personAnswers = str_split($groupAnswer);
            foreach ($personAnswers as $personAnswer) {
                isset($filtered[$personAnswer])
                    ? $filtered[$personAnswer]++
                    : $filtered[$personAnswer] = 1;
            }
        }

        return $filtered;
    }

    public function getTaskB(array $data): int
    {
        $count = 0;
        foreach ($data as $answers) {
            $groupAnswers = explode('|', $answers);
            $filtered = $this->filterData($groupAnswers);

            foreach ($filtered as $filter) {
                if ($filter === count($groupAnswers)) {
                    $count++;
                }
            }
        }

        return $count;
    }
}
