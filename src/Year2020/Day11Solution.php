<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2020;

use Daviidxo\AdventOfCode\SolutionBase;

class Day11Solution extends SolutionBase
{
    /**
     * @var array
     */
    public $directions = [
            [-1, -1],
            [-1,  0],
            [-1, +1],
            [0,  -1],
            [0,  +1],
            [1,  -1],
            [1,   0],
            [1,  +1],
    ];

    protected function parseFile(string $input): array
    {
        $fp = fopen($input, 'r');

        $data = [];
        $i = 0;
        $j = 0;
        while ($char = fgetc($fp)) {
            if ($char !== PHP_EOL) {
                $data[$i][$j++] = $char;

                continue;
            }

            $i++;
            $j = 0;
        }

        return $data;
    }

    public function getTaskA(array $data): int
    {
        $lastData = [];
        while ($lastData !== $data) {
            $lastData = $data;
            for ($i = 0; $i < count($data); $i++) {
                for ($j = 0; $j < count($data[$i]); $j++) {
                    $currentSeat = $data[$i][$j];

                    if ($this->isFloor($currentSeat)) {
                        continue;
                    }

                    $occupiedAdjacent = $this->getOccupiedAdjacentCount($i, $j, $lastData);

                    if (!$this->isSeatOccupied($currentSeat)
                        && $occupiedAdjacent === 0
                    ) {
                        $data[$i][$j] = '#';

                        continue;
                    }

                    if ($this->isSeatOccupied($currentSeat)
                        && $occupiedAdjacent > 3
                    ) {
                        $data[$i][$j] = 'L';
                    }
                }
            }
        }

        $count = 0;
        foreach ($data as $seatRow) {
            foreach ($seatRow as $seat) {
                $count += (int) (!$this->isFloor($seat) && $this->isSeatOccupied($seat));
            }
        }

        return $count;
    }

    public function isFloor(string $place): bool
    {
        return $place === '.';
    }

    public function getOccupiedAdjacentCount(int $row, int $col, array $data): int
    {
        $count = 0;
        foreach ($this->directions as $direction) {
            $count += (int) $this
                ->isSeatOccupied($data[$row + $direction[0]][$col + $direction[1]] ?? '');
        }

        return $count;
    }

    public function isSeatOccupied(string $seat): bool
    {
        return $seat === '#';
    }

    public function getTaskB(array $data): int
    {
        $lastData = [];
        while ($lastData !== $data) {
            $lastData = $data;
            for ($i = 0; $i < count($data); $i++) {
                for ($j = 0; $j < count($data[$i]); $j++) {
                    $currentSeat = $data[$i][$j];

                    if ($this->isFloor($currentSeat)) {
                        continue;
                    }

                    $visibleOccupied = $this->getNearestVisibleOccupiedSeat($i, $j, $lastData);

                    if (!$this->isSeatOccupied($currentSeat)
                        && $visibleOccupied === 0
                    ) {
                        $data[$i][$j] = '#';

                        continue;
                    }

                    if ($this->isSeatOccupied($currentSeat)
                        && $visibleOccupied > 4
                    ) {
                        $data[$i][$j] = 'L';
                    }
                }
            }
        }

        $count = 0;
        foreach ($data as $seatRow) {
            foreach ($seatRow as $seat) {
                $count += (int) (!$this->isFloor($seat) && $this->isSeatOccupied($seat));
            }
        }

        return $count;
    }

    public function getNearestVisibleOccupiedSeat(int $row, int $col, array $data): int
    {
        $count = 0;
        foreach ($this->directions as $direction) {
            $i = 1;
            while ($this->isFloor($data[$row + ($i * $direction[0])][$col + ($i * $direction[1])] ?? '')) {
                $i++;
            }
            $currentPlace = $data[$row + ($i * $direction[0])][$col + ($i * $direction[1])] ?? '';

            $count += (int) $this->isSeatOccupied($currentPlace);
        }

        return $count;
    }
}
