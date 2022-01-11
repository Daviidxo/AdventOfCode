<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day12Solution extends SolutionBase
{

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $map = [];
        foreach ($data as $row) {
            $points = explode('-', $row);
            $map[$points[0]][] = $points[1];
            $map[$points[1]][] = $points[0];
        }

        return $this->goToNextPosition('start', $map);
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $map = [];
        foreach ($data as $row) {
            $points = explode('-', $row);
            $map[$points[0]][] = $points[1];
            $map[$points[1]][] = $points[0];
        }

        return $this->goToNextPositionB('start', $map);
    }

    protected function goToNextPosition(string $currentPosition, array $map, array &$paths = [], int $i = 0): int
    {
        $currentPath = $paths[$i] ?? [];
        $currentPath[] = $currentPosition;

        if ($currentPosition === 'end') {
            $paths[$i] = $currentPath;

            return $i + 1;
        }

        foreach ($map[$currentPosition] as $nextPosition) {
            if (ctype_lower($nextPosition)
                && in_array($nextPosition, $currentPath)
            ) {
                continue;
            }

            $paths[$i] = $currentPath;
            $i = $this->goToNextPosition($nextPosition, $map, $paths, $i);
        }

        return $i;
    }

    protected function goToNextPositionB(
        string $currentPosition,
        array $map,
        array &$paths = [],
        int $i = 0
    ): int {
        $currentPath = $paths[$i] ?? [];
        $currentPath[] = $currentPosition;

        if ($currentPosition === 'end') {
            $paths[$i] = $currentPath;
            return $i + 1;
        }

        foreach ($map[$currentPosition] as $nextPosition) {
            if (ctype_lower($nextPosition)
                && in_array($nextPosition, $currentPath)
                && count(array_unique($this->getLowercaseElements($currentPath)))
                    < count($this->getLowercaseElements($currentPath))
            ) {
                continue;
            }

            if ($nextPosition === 'start') {
                continue;
            }

            $paths[$i] = $currentPath;
            $i = $this->goToNextPositionB($nextPosition, $map, $paths, $i);
        }

        return $i;
    }

    protected function getLowercaseElements(array $array): array
    {
        $lowers = [];
        foreach ($array as $element) {
            if (!ctype_lower($element)) {
                continue;
            }

            $lowers[] = $element;
        }

        return $lowers;
    }
}
