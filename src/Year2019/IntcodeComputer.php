<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2019;

class IntcodeComputer
{
    public function execute(array $data): array
    {
        $i = 0;
        $outputs = [];
        while (true) {
            $instructions = $this->parseInstruction((string) $data[$i]);
            $opCode = (int) $instructions['opCode'];
            if ($i > 1000) {
                break;
            }
            if ($opCode === 99) {
                break;
            }

            $firstParameter = $data[$i + 1];

            switch ($opCode) {
                case 1:
                    $secondParameter = $data[$i + 2];
                    $thirdParameter = $data[$i + 3];
                    $data[$thirdParameter] = $data[$firstParameter] + $data[$secondParameter];
                    break;
                case 2:
                    $secondParameter = $data[$i + 2];
                    $thirdParameter = $data[$i + 3];
                    $data[$thirdParameter] = $data[$firstParameter] * $data[$secondParameter];
                    break;
                case 3:
                    $input = 1;
                    $data[$firstParameter] = $input;
                    break;
                case 4:
                    $outputs[] = $data[$firstParameter];
                    break;
            }

            $i += count(array_filter($instructions)) !== 1 ? count($instructions) : 4;
        }

        return [
            'data' => $data,
            'outputs' => $outputs,
        ];
    }

    public function parseInstruction(string $instruction): array
    {
        $numbers = array_reverse(str_split($instruction));
        return [
            'opCode' => isset($numbers[1]) ? $numbers[0] . $numbers[1] : $numbers[0],
            'firstParameterMode' => $numbers[2] ?? null,
            'secondParameterMode' => $numbers[3] ?? null,
            'thirdParameterMode' => $numbers[4] ?? null,
        ];
    }
}
