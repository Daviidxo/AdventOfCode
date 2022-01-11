<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day13Solution extends SolutionBase
{
    /**
     * {@inheritdoc}
     */
    protected function parseFile(string $input): array
    {
        $file = file($input, FILE_IGNORE_NEW_LINES);

        $data = [];
        $matches = [];
        foreach ($file as $row) {
            if (!$row) {
                continue;
            }

            if (preg_match('/fold along ([x|y])=(\d+)/', $row, $matches)) {
                $data['folds'][] = [
                    'direction' => $matches[1],
                    'value' => $matches[2],
                ];

                continue;
            }

            $dotPositions = explode(',', $row);
            $data['dots'][] = [
                'x' => $dotPositions[0],
                'y' => $dotPositions[1],
            ];
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $paper = $this->fillPaper($data['dots']);

        $this->foldPaper($paper, $data['folds'][0]['direction'], $data['folds'][0]['value']);

        return $this->countDots($paper);
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $paper = $this->fillPaper($data['dots']);

        foreach ($data['folds'] as $fold) {
            $this->foldPaper($paper, $fold['direction'], $fold['value']);
        }
        // Unlike other days this needs a string solution,
        // which can be read by outputting this array so printing is necessary.
        $this->printPaper($paper);

        return $this->countDots($paper);
    }

    protected function printPaper(array $paper)
    {
        echo PHP_EOL;
        foreach ($paper as $row) {
            foreach ($row as $pos) {
                echo $pos;
            }
            echo PHP_EOL;
        }
    }

    protected function foldPaper(array &$paper, string $direction, int $value)
    {
        if ($direction === 'y') {
            $rowCount = count($paper);
            for ($i = 0; $i < $value; $i++) {
                $paper[$i] = $this->foldRows($paper[$i], $paper[$rowCount - $i - 1]);

                unset($paper[$rowCount - $i - 1]);
            }
            unset($paper[$value]);
        }

        if ($direction === 'x') {
            foreach ($paper as $i => $row) {
                $leftSlice = array_slice($row, 0, $value);
                $rightSlice = array_reverse(array_slice($row, $value + 1));

                $paper[$i] = $this->foldRows($leftSlice, $rightSlice);
            }
        }
    }

    protected function foldRows(array $rowA, array $rowB): array
    {
        foreach ($rowB as $i => $dot) {
            $rowA[$i] = $dot === '#' ? $dot : $rowA[$i];
        }

        return $rowA;
    }

    protected function countDots(array $paper): int
    {
        $count = 0;
        foreach ($paper as $row) {
            foreach ($row as $pos) {
                $count += $pos === '#' ? 1 : 0;
            }
        }

        return $count;
    }

    protected function fillPaper(array $dots): array
    {
        $paper = $this->createPaper($dots);

        foreach ($dots as $dot) {
            $paper[$dot['y']][$dot['x']] = '#';
        }

        return $paper;
    }

    protected function createPaper(array $dots): array
    {
        $yMax = $this->getMax($dots, 'y');
        $xMax = $this->getMax($dots, 'x');

        $paper = [];
        for ($i = 0; $i < $yMax + 1; $i++) {
            $paper[] = array_fill('0', $xMax + 1, '.');
        }

        return $paper;
    }

    protected function getMax(array $dots, $key): Int
    {
        $max = 0;
        foreach ($dots as $dot) {
            if ($max > $dot[$key]) {
                continue;
            }

            $max = $dot[$key];
        }

        return $max;
    }
}
