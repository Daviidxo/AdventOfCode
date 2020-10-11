<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2019;

use Daviidxo\AdventOfCode\SolutionBase;

class Day01Solution extends SolutionBase
{

    public function getSolution(string $filePath): array
    {
        $data = file($filePath, FILE_IGNORE_NEW_LINES);

        $fuelNeeded = $this->getTaskA($data);
        $allFuelNeeded = $this->getTaskB($data);

        return [
            'taskA' => $fuelNeeded,
            'taskB' => $allFuelNeeded,
        ];
    }

    public function getTaskA(array $data): int
    {
        $fuel = 0;
        foreach ($data as $mass) {
            $fuel += $this->getFuelByMass((int) $mass);
        }

        return $fuel;
    }

    public function getTaskB(array $data): int
    {
        $allFuel = 0;
        foreach ($data as $mass) {
            $fuel = (int) $mass;

            while (true) {
                $fuel = $this->getFuelByMass($fuel);

                if ($fuel <= 0) {
                    break;
                }

                $allFuel += $fuel;
            }
        }

        return $allFuel;
    }

    public function getFuelByMass(int $mass): int
    {
        return (int) floor($mass / 3) - 2;
    }
}
