<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2020;

use Daviidxo\AdventOfCode\SolutionBase;

class Day08Solution extends SolutionBase
{
    /**
     * {@inheritdoc}
     */
    public function getSolution(string $input): array
    {
        $data = file($input, FILE_IGNORE_NEW_LINES);

        return [
            'taskA' => $this->getTaskA($data),
            'taskB' => $this->getTaskB($data),
        ];
    }

    public function getTaskA(array $data): int
    {
        return $this->loopThrough($data)['acc'];
    }

    public function loopThrough(array $data): array
    {
        $acc = 0;
        $visited = [];
        $i = 0;
        $isLoop = true;

        while (true) {
            if (!isset($data[$i])) {
                $isLoop = false;
                break;
            }

            if (in_array($i, $visited)) {
                break;
            }

            $visited[] = $i;
            $instruction = $this->parseInstruction($data[$i]);

            switch ($instruction['command']) {
                case 'acc':
                    $acc += $instruction['value'];
                    break;
                case 'jmp':
                    $i += $instruction['value'];
                    continue 2;
                    break;
                case 'nop':
                    //Do nothing.
                    break;
            }

            $i++;
        }

        return [
            'acc' => $acc,
            'isLoop' => $isLoop,
        ];
    }

    public function parseInstruction(string $instruction): array
    {
        $split = explode(' ', $instruction);

        return [
            'command' => $split[0],
            'value' => $split[1],
        ];
    }

    public function getTaskB(array $data): int
    {
        foreach ($data as $i => $instruction) {
            $ins = $this->parseInstruction($instruction);

            if ($ins['command'] === 'acc') {
                continue;
            }

            $switchedCommand = $ins['command'] === 'nop' ? 'jmp' : 'nop';
            $data[$i] = "{$switchedCommand} {$ins['value']}";

            $loop = $this->loopThrough($data);

            if (!$loop['isLoop']) {
                return $loop['acc'];
            }

            $data[$i] = join(' ', $ins);
        }

        return 0;
    }
}
