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
                && $this->arrayContainsMultipleLowercaseElements($currentPath)
            ) {
                continue;
            }

            if ($nextPosition === 'start') {
                continue;
            }

//            if ($this->sameLowercase) {
//                continue;
//            }
//            $this->sameLowercase = $this->arrayContainsMultipleLowercaseElements($currentPath);

            $paths[$i] = $currentPath;
            $i = $this->goToNextPositionB($nextPosition, $map, $paths, $i);
        }

        return $i;
    }

    protected function arrayContainsMultipleLowercaseElements(array $array): bool
    {
        $lowers = [];
        foreach ($array as $element) {
            if (!ctype_lower($element)
                || $element === 'start'
                || $element === 'end'
            ) {
                continue;
            }

            $lowers[] = $element;
        }

        foreach ($lowers as $i => $lower) {
            unset($lowers[$i]);

            if (array_search($lower, $lowers)) {
                return true;
            }
        }

        return false;
    }

    protected function arrayContainsSameLowercaseElementMoreThanTwice(array $array, $element): bool
    {
        $index = array_search($element, $array);
        if ($index === false) {
            return false;
        }

        unset($array[$index]);

        return in_array($element, $array);
    }
}
