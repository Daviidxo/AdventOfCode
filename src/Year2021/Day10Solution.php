<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day10Solution extends SolutionBase
{
    protected array $chars = [
        '(' => ')',
        '[' => ']',
        '{' => '}',
        '<' => '>',
    ];

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $scoreMapping = [
            ')' => 3,
            ']' => 57,
            '}' => 1197,
            '>' => 25137,
        ];

        $errorScore = 0;
        foreach ($data as $row) {
            $chars = str_split($row);

            $wrongChar = $this->findWrongClosingTag($chars);
            if (!$wrongChar) {
                continue;
            }

            $errorScore += $scoreMapping[$wrongChar];
        }

        return $errorScore;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $scoreMapping = [
            ')' => 1,
            ']' => 2,
            '}' => 3,
            '>' => 4,
        ];

        $autocompleteScores = [];
        $i = 0;
        foreach ($data as $row) {
            $chars = str_split($row);

            $wrongChar = $this->findWrongClosingTag($chars);
            if ($wrongChar) {
                continue;
            }

            $autocompleteScores[$i] = 0;
            $autocompleteChars = $this->getAutocompleteChars($chars);

            foreach ($autocompleteChars as $autocompleteChar) {
                $autocompleteScores[$i] *= 5;
                $autocompleteScores[$i] += $scoreMapping[$autocompleteChar];
            }

            $i++;
        }

        sort($autocompleteScores);

        return $autocompleteScores[count($autocompleteScores) / 2];
    }

    protected function findWrongClosingTag(array $chars): ?string
    {
        $expectedNextClosing = [];
        foreach ($chars as $char) {
            if (in_array($char, array_keys($this->chars))) {
                $expectedNextClosing[] = $this->chars[$char];
                continue;
            }

            if ($char !== end($expectedNextClosing)) {
                return $char;
            }

            unset($expectedNextClosing[array_key_last($expectedNextClosing)]);
        }

        return null;
    }

    protected function getAutocompleteChars(array $chars): array
    {
        $needsClosingChar = [];
        foreach ($chars as $char) {
            if (in_array($char, array_keys($this->chars))) {
                $needsClosingChar[] = $char;
                continue;
            }

            unset($needsClosingChar[array_key_last($needsClosingChar)]);
        }

        $closingChars = [];
        foreach ($needsClosingChar as $openingChar) {
            $closingChars[] = $this->chars[$openingChar];
        }

        return array_reverse($closingChars);
    }
}
