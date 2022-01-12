<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day14Solution extends SolutionBase
{
    /**
     * {@inheritdoc}
     */
    public function parseFile(string $input): array
    {
        $file = file($input, FILE_IGNORE_NEW_LINES);

        $data = [];
        $matches = [];
        foreach ($file as $row) {
            if (!$row) {
                continue;
            }

            if (preg_match('/(..) -> (.)/', $row, $matches)) {
                $data['pairMapping'][$matches[1]] = $matches[2];

                continue;
            }

            $data['template'] = $row;
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        return $this->getTask($data, 10);
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        return $this->getTask($data, 40);
    }

    protected function getTask(array $data, int $runAmount): Int
    {
        $pairMapping = $data['pairMapping'];
        $template = str_split($data['template']);

        $pairs = $this->initializePairs($pairMapping, $template);
        $chars = $this->getChars($pairMapping);

        for ($i = 0; $i < $runAmount; $i++) {
            $this->runProcess($pairMapping, $pairs, $chars);
        }

        foreach ($template as $char) {
            $chars[$char]++;
        }

        return max($chars) - min($chars);
    }

    protected function initializePairs(array $pairMapping, array $template): array
    {
        $pairs = [];
        foreach (array_keys($pairMapping) as $pair) {
            $pairs[$pair] = 0;
        }

        for ($i = 0; $i < count($template) - 1; $i++) {
            $key = $template[$i] . $template[$i + 1];
            $pairs[$key]++;
        }

        return $pairs;
    }

    protected function getChars(array $pairMapping): array
    {
        $chars = [];
        foreach (array_unique(array_values($pairMapping)) as $char) {
            $chars[$char] = 0;
        }

        return $chars;
    }

    public function runProcess(array $pairMapping, array &$pairs, array &$chars)
    {
        foreach ($pairs as $pair => $count) {
            $split = str_split($pair);
            $insert = $pairMapping[$pair];

            $pairs[$pair] -= $count;

            $key = $split[0] . $insert;
            $pairs[$key] += $count;

            $key = $insert . $split[1];
            $pairs[$key] += $count;

            $chars[$insert] += $count;
        }
    }
}
