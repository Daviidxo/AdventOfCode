<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2020;

use Daviidxo\AdventOfCode\SolutionBase;

class Day04Solution extends SolutionBase
{
    /**
     * {@inheritdoc}
     */
    public function getSolution(string $input): array
    {
        $data = $this->parseInput($input);

        return [
            'taskA' => $this->getTaskA($data),
            'taskB' => $this->getTaskB($data),
        ];
    }

    public function parseInput(string $input)
    {
        $data = [];
        $contents = file($input, FILE_IGNORE_NEW_LINES);
        $index = 0;
        foreach ($contents as $i => $line) {
            if (!$line) {
                $index++;
            }

            if (!isset($data[$index])) {
                $data[$index] = $line;
            }

            $data[$index] .= " $line";
        }

        foreach ($data as $i => $d) {
            $data[$i] = ltrim($d);
        }

        return $data;
    }

    public function getTaskA(array $data): int
    {
        $valid = 0;
        foreach ($data as $passportData) {
            $passportValues = $this->parsePassportData($passportData);
            $valid += (int) $this->validatePassportSoft($passportValues);
        }

        return $valid;
    }

    public function validatePassportSoft(array $passportValues): bool
    {
        $count = count($passportValues);

        switch ($count) {
            case 8:
                return true;
            case 7:
                return !isset($passportValues['cid']);
        }

        return false;
    }

    public function getTaskB(array $data): int
    {
        $valid = 0;
        foreach ($data as $passportData) {
            $passportValues = $this->parsePassportData($passportData);
            $valid += (int) $this->validatePassportHard($passportValues);
        }

        return $valid;
    }

    public function validatePassportHard(array $passportValues): bool
    {
        if ($this->validatePassportSoft($passportValues)
            && $this->validateBirthYear($passportValues['byr'])
            && $this->validateIssueYear($passportValues['iyr'])
            && $this->validateExpirationYear($passportValues['eyr'])
            && $this->validateHeight($passportValues['hgt'])
            && $this->validateHairColor($passportValues['hcl'])
            && $this->validateEyeColor($passportValues['ecl'])
            && $this->validatePassportId($passportValues['pid'])
        ) {
            return true;
        }

        return false;
    }

    public function validateBirthYear(string $value): bool
    {
        return strlen($value) === 4 && $this->isBetween((int) $value, 1920, 2002);
    }

    public function validateIssueYear(string $value): bool
    {
        return strlen($value) === 4 && $this->isBetween((int) $value, 2010, 2020);
    }

    public function validateExpirationYear(string $value): bool
    {
        return strlen($value) === 4 && $this->isBetween((int) $value, 2020, 2030);
    }

    public function validateHeight(string $value): bool
    {
        $matches = [];
        preg_match('/(\d+)(cm|in)/', $value, $matches);
        if (!$matches) {
            return false;
        }

        $num = (int) $matches[1];
        $measurement = $matches[2];

        return $measurement === 'cm'
            ? $this->isBetween($num, 150, 193)
            : $this->isBetween($num, 59, 75);
    }

    public function validateHairColor(string $value): bool
    {
        return (bool) preg_match('/^#([0-9]|[a-f]){6}$/', $value);
    }

    public function validateEyeColor(string $value): bool
    {
        $validEyeColors = [
            'amb',
            'blu',
            'brn',
            'gry',
            'grn',
            'hzl',
            'oth',
        ];

        return in_array($value, $validEyeColors);
    }

    public function validatePassportId(string $value): bool
    {
        return strlen($value) === 9;
    }

    public function isBetween(int $value, int $min, int $max): bool
    {
        return $value >= $min && $value <= $max;
    }

    public function parsePassportData(string $passport): array
    {
        $passportValues = [];

        $fields = preg_split('/(\s|\r|\n|\r\n)/', $passport);
        foreach ($fields as $field) {
            $keyValue = explode(':', $field);
            $passportValues[$keyValue[0]] = $keyValue[1];
        }

        return $passportValues;
    }
}
