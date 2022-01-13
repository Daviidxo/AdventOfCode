<?php

namespace Daviidxo\AdventOfCode\Year2021;

use Daviidxo\AdventOfCode\SolutionBase;

class Day04Solution extends SolutionBase
{
    /**
     * {@inheritdoc}
     */
    protected function parseFile(string $input): array
    {
        $data = [
            'boards' => [],
        ];
        $file = file($input);

        $data['numbers'] = explode(',', $file[0]);

        foreach ($file as &$line) {
            $line = trim($line);
        }

        $board = [];
        for ($i = 2; $i < count($file); $i++) {
            if ($file[$i] == '') {
                $data['boards'][] = $board;
                $board = [];
                continue;
            }

            $boardLine = explode(' ', $file[$i]);
            $boardLine = array_filter($boardLine, function ($a) {
                return $a !== '';
            });
            $boardLine = array_values($boardLine);

            $board[] = $boardLine;
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskA(array $data): int
    {
        $winBoards = [];
        foreach ($data['boards'] as $i) {
            $winBoards[] = $this->createWinBoard();
        }

        foreach ($data['numbers'] as $i => $number) {
            foreach ($data['boards'] as $boardId => $board) {
                foreach ($board as $lineNum => $boardLine) {
                    $numPos = array_search($number, $boardLine);
                    if ($numPos !== false) {
                        $winBoards[$boardId][$lineNum][$numPos] = true;
                    }
                }

                if ($i > 4 && $this->isBoardWon($winBoards[$boardId])) {
                    return $this->calculateScore($board, $winBoards[$boardId], $number);
                }
            }
        }

        return 0;
    }

    /**
     * {@inheritdoc}
     */
    public function getTaskB(array $data): int
    {
        $winBoards = [];
        foreach ($data['boards'] as $i) {
            $winBoards[] = $this->createWinBoard();
        }

        $boardScores = [];
        foreach ($data['numbers'] as $i => $number) {
            foreach ($data['boards'] as $boardId => $board) {
                foreach ($board as $lineNum => $boardLine) {
                    $numPos = array_search($number, $boardLine);
                    if ($numPos !== false) {
                        $winBoards[$boardId][$lineNum][$numPos] = true;
                    }
                }

                if ($i > 4 && $this->isBoardWon($winBoards[$boardId])) {
                    if (!isset($boardScores[$boardId])) {
                        $score = $this->calculateScore($board, $winBoards[$boardId], $number);
                        $boardScores[$boardId] = $score;
                    }
                }

                if (count($boardScores) === count($data['boards'])) {
                    return end($boardScores);
                }
            }
        }

        return 0;
    }

    protected function createWinBoard(): array
    {
        $board = [];
        for ($i = 0; $i < 5; $i++) {
            $board[] = array_fill(0, 5, false);
        }

        return $board;
    }

    protected function isBoardWon(array $board): bool
    {
        foreach ($board as $boardLine) {
            foreach ($boardLine as $lineNum) {
                if (!$lineNum) {
                    continue 2;
                }
            }

            return true;
        }

        for ($i = 0; $i < count($board); $i++) {
            $col = array_column($board, $i);
            foreach ($col as $num) {
                if (!$num) {
                    continue 2;
                }
            }
            return true;
        }

        return false;
    }

    protected function calculateScore(array $board, array $winBoard, int $finalNumber): int
    {
        $score = 0;

        foreach ($board as $lineIndex => $boardLine) {
            foreach ($boardLine as $numPos => $lineNumber) {
                if (!$winBoard[$lineIndex][$numPos]) {
                    $score += $lineNumber;
                }
            }
        }

        return $score * $finalNumber;
    }
}
