<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day09Solution extends SolutionBase
{

    protected array $directions = [
        [-1, 0],
        [0, -1],
        [0, 1],
        [1, 0],
    ];

    /**
     * {@inheritdoc}
     */
    public function parseFile(string $input): array
    {
        $file = file($input, FILE_IGNORE_NEW_LINES);

        $data = [];
        foreach ($file as $row) {
            $data[] = str_split($row);
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $sum = 0;

        $lowPoints = $this->getLowPoints($data);
        foreach ($lowPoints as $lowPoint) {
            $sum += $lowPoint + 1;
        }

        return $sum;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $lowPoints = $this->getLowPoints($data);
        $basinCounts = [];
        foreach (array_keys($lowPoints) as $lowPoint) {
            $position = explode(',', $lowPoint);
            $basin = $this->getBasin($data, ["$position[0],$position[1]"]);

            $basinCounts[] = count($basin);
        }

        rsort($basinCounts);

        $multiplied = 1;
        foreach ($basinCounts as $i => $basinCount) {
            if ($i > 2) {
                return $multiplied;
            }

            $multiplied *= $basinCount;
        }

        return $multiplied;
    }

    protected function getLowPoints(array $data): array
    {
        $lowPoints = [];
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data[$i]); $j++) {
                $lowerCount = 0;
                $exists = 0;

                foreach ($this->directions as $dir) {
                    $check = $data[$i + $dir[0]][$j + $dir[1]] ?? NULL;
                    if ($check === NULL) {
                        continue;
                    }

                    $exists++;

                    if ($data[$i][$j] < $check) {
                        $lowerCount++;
                    }
                }

                if ($lowerCount === $exists) {
                    $lowPoints["$i,$j"] = $data[$i][$j];
                }
            }
        }

        return $lowPoints;
    }

    protected function getBasin(array $data, array $usedValuesMap): array
    {
        $position = explode(',', end($usedValuesMap));
        $i = $position[0];
        $j = $position[1];

        foreach ($this->directions as $dir) {
            $ii = $i + $dir[0];
            $jj = $j + $dir[1];

            if (in_array("$ii,$jj", $usedValuesMap)) {
                continue;
            }

            $check = $data[$ii][$jj] ?? NULL;
            if ($check === NULL || $check == 9) {
                continue;
            }

            $usedValuesMap[] = "$ii,$jj";
            $usedValuesMap = array_unique(array_merge($usedValuesMap, $this->getBasin($data, $usedValuesMap)));
        }

        return $usedValuesMap;
    }

}
