<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day08Solution extends SolutionBase
{

    /**
     * @var array
     */
    protected array $digitsSegmentMapping = [
        0 => 6,
        1 => 2,
        2 => 5,
        3 => 5,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 3,
        8 => 7,
        9 => 6,
    ];

    protected function parseFile(string $input): array
    {
        $file = file($input, FILE_IGNORE_NEW_LINES);

        $data = [];
        foreach ($file as $i => $row) {
            $split = explode(' | ', $row);
            $data[$i]['digits'] = explode(' ', $split[0]);
            $data[$i]['outputs'] = explode(' ', $split[1]);
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $count = 0;
        foreach ($data as $row) {
            $outputs = $row['outputs'];
            foreach ($outputs as $output) {
                $count += $this->isUnique($output) ? 1 : 0;
            }
        }

        return $count;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $sum = 0;
        foreach ($data as $row) {
            $mapping = $this->getMappings($row['digits']);
            $rowSum = '';

            foreach ($row['outputs'] as $output) {
                $outputSegments = str_split($output);

                foreach ($mapping as $number => $map) {
                    if ($this->sameElements($map, $outputSegments)) {
                        $rowSum .= $number;
                        break;
                    }
                }
            }

            $sum += (int) $rowSum;
        }

        return $sum;
    }

    protected function getMappings(array $input): array
    {
        $digits = array_fill(0, 9, []);
        foreach ($input as $i => $segments) {
            if ($this->isUnique($segments)) {
                $len = strlen($segments);
                $digits[array_search($len, $this->digitsSegmentMapping)] = str_split($segments);
                unset($input[$i]);
            }
        }

        $segmentMapping = [];

        $top = array_diff($digits[7], $digits[1]);
        $segmentMapping['top'] = reset($top);

        foreach ($input as $i => $digit) {
            $digit = str_split($digit);
            $segmentsCount = count($digit);
            //digit 3.
            if ($segmentsCount === 5
                && count(array_diff($digit, $digits[7])) === 2
            ) {
                $digits[3] = $digit;
                unset($input[$i]);
            }
        }

        $bottom = array_diff($digits[3], $digits[4], [$segmentMapping['top']]);

        $middle = array_diff($digits[3], $digits[1], $bottom, $top);
        $segmentMapping['middle'] = reset($middle);
        //digit 9.
        $digits[9] = array_unique(array_merge($digits[3], $digits[4]), SORT_REGULAR);

        $topLeft = array_diff($digits[9], $digits[3]);
        $segmentMapping['top_left'] = reset($topLeft);

        foreach ($input as $i => $digit) {
            $digit = str_split($digit);
            $segmentsCount = count($digit);

            if ($segmentsCount === 5) {
                //digit 5.
                if (in_array($segmentMapping['top_left'], $digit)) {
                    $digits[5] = $digit;
                    unset($input[$i]);
                }
                //digit 2.
                if (!in_array($segmentMapping['top_left'], $digit) && $digit != $digits[3]) {
                    $digits[2] = $digit;
                    unset($input[$i]);
                }
            }

            if ($segmentsCount === 6) {
                //digit 6.
                if (count(array_unique(array_merge($digit, $digits[1]), SORT_REGULAR)) === 7) {
                    $digits[6] = $digit;
                    unset($input[$i]);

                    continue;
                }

                if (count($digit) === 6 && !in_array($segmentMapping['middle'], $digit)) {
                    $digits[0] = $digit;
                    unset($input[$i]);
                }
            }
        }

        return $digits;
    }

    protected function isUnique(string $segments): bool
    {
        $len = strlen($segments);

        return in_array($len, $this->getUniqueSegments());
    }

    protected function sameElements(array $a, array $b): bool
    {
        sort($a);
        sort($b);

        return $a === $b;
    }

    protected function getUniqueSegments(): array
    {
        return [
            $this->digitsSegmentMapping[1],
            $this->digitsSegmentMapping[4],
            $this->digitsSegmentMapping[7],
            $this->digitsSegmentMapping[8],
        ];
    }
}
