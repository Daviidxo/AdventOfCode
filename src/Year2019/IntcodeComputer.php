<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2019;

class IntcodeComputer
{
    /**
     * @var array
     */
    protected $data = [];

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): IntcodeComputer
    {
        $this->data = $data;

        return $this;
    }

    public function execute(array $data, ?int $input = null): array
    {
        $this->setData($data);

        $i = 0;
        $outputs = [];
        while (true) {
            $instructions = $this->parseInstruction((string) $this->data[$i]);
            $opCode = (int) $instructions['opCode'];

            if ($opCode === 99) {
                break;
            }

            if (!isset($this->data[$i + 1])) {
                break;
            }

            $stepCount = 4;

            switch ($opCode) {
                case 1:
                    $firstParameter = $this->getParameter($i + 1, (int) $instructions['firstParameterMode']);
                    $secondParameter = $this->getParameter($i + 2, (int) $instructions['secondParameterMode']);
                    $thirdParameter = $this->data[$i + 3];
                    $this->data[$thirdParameter] = $firstParameter + $secondParameter;
                    break;
                case 2:
                    $firstParameter = $this->getParameter($i + 1, (int) $instructions['firstParameterMode']);
                    $secondParameter = $this->getParameter($i + 2, (int) $instructions['secondParameterMode']);
                    $thirdParameter = $this->data[$i + 3];
                    $this->data[$thirdParameter] = $firstParameter * $secondParameter;
                    break;
                case 3:
                    $firstParameter = $this->data[$i + 1];
                    $this->data[$firstParameter] = $input;
                    $stepCount = 2;
                    break;
                case 4:
                    $firstParameter = $this->getParameter($i + 1, (int) $instructions['firstParameterMode']);
                    $outputs[] = $firstParameter;
                    $stepCount = 2;
                    break;
                case 5:
                    $firstParameter = $this->getParameter($i + 1, (int) $instructions['firstParameterMode']);
                    $secondParameter = $this->getParameter($i + 2, (int) $instructions['secondParameterMode']);
                    if ($firstParameter !== 0) {
                        $i = $secondParameter;
                        continue 2;
                    }
                    $stepCount = 3;
                    break;
                case 6:
                    $firstParameter = $this->getParameter($i + 1, (int) $instructions['firstParameterMode']);
                    $secondParameter = $this->getParameter($i + 2, (int) $instructions['secondParameterMode']);
                    if ($firstParameter === 0) {
                        $i = $secondParameter;
                        continue 2;
                    }
                    $stepCount = 3;
                    break;
                case 7:
                    $firstParameter = $this->getParameter($i + 1, (int) $instructions['firstParameterMode']);
                    $secondParameter = $this->getParameter($i + 2, (int) $instructions['secondParameterMode']);
                    if ($firstParameter < $secondParameter) {
                        $this->data[$this->data[$i + 3]] = 1;
                        break;
                    }
                    $this->data[$this->data[$i + 3]] = 0;
                    break;
                case 8:
                    $firstParameter = $this->getParameter($i + 1, (int) $instructions['firstParameterMode']);
                    $secondParameter = $this->getParameter($i + 2, (int) $instructions['secondParameterMode']);
                    if ($firstParameter === $secondParameter) {
                        $this->data[$this->data[$i + 3]] = 1;
                        break;
                    }
                    $this->data[$this->data[$i + 3]] = 0;
                    break;
            }

            $i += $stepCount;
        }
        
        return [
            'data' => $this->data,
            'outputs' => empty($outputs) ? [] : max($outputs),
        ];
    }

    public function getParameter(int $index, int $mode): ?int
    {
        $value = (int) $this->data[$index];

        switch ($mode) {
            case 0:
                return (int) $this->data[$value];
                break;
            case 1:
                return $value;
                break;
        }

        return null;
    }

    public function parseInstruction(string $instruction): array
    {
        $numbers = array_reverse(str_split($instruction));

        return [
            'opCode' => ($numbers[1] ?? 0) . $numbers[0],
            'firstParameterMode' => $numbers[2] ?? 0,
            'secondParameterMode' => $numbers[3] ?? 0,
        ];
    }
}
