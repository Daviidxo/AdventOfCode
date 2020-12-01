<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2019;

use Daviidxo\AdventOfCode\Year2019\IntcodeComputer;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Daviidxo\AdventOfCode\Year2019\IntcodeComputer<extended>
 */
class IntcodeComputerTest extends TestCase
{

    public function casesExecuteData(): array
    {
        return [
            'example 1' => [
                [2, 0, 0, 0, 99],
                [1, 0, 0, 0, 99],
            ],
            'example 2' => [
                [2, 3, 0, 6, 99],
                [2, 3, 0, 3, 99],
            ],
            'example 3' => [
                [2, 4, 4, 5, 99, 9801],
                [2, 4, 4, 5, 99, 0],
            ],
            'example 4' => [
                [30, 1, 1, 4, 2, 5, 6, 0, 99],
                [1, 1, 1, 4, 99, 5, 6, 0, 99],
            ],
            'firstParameter not set' => [
                [1],
                [1],
            ],
        ];
    }

    /**
     * @dataProvider casesExecuteData
     */
    public function testExecuteData(array $expected, array $data, int $input = null)
    {
        $actual = (new IntcodeComputer())->execute($data, $input)['data'];

        static::assertSame($expected, $actual);
    }

    public function casesExecuteOutput(): array
    {
        return [
            'input equal to 8 - true - position mode' => [
                1,
                [3, 9, 8, 9, 10, 9, 4, 9, 99, -1, 8],
                8,
            ],
            'input equal to 8 - false - position mode' => [
                0,
                [3, 9, 8, 9, 10, 9, 4, 9, 99, -1, 8],
                9,
            ],
            'input less than 8 - true - position mode' => [
                1,
                [3, 9, 7, 9, 10, 9, 4, 9, 99, -1, 8],
                7,
            ],
            'input less than 8 - false - position mode' => [
                0,
                [3, 9, 7, 9, 10, 9, 4, 9, 99, -1, 8],
                9,
            ],
            'input equal to 8 - true - immediate mode' => [
                1,
                [3, 3, 1108, -1, 8, 3, 4, 3, 99],
                8,
            ],
            'input equal to 8 - false - immediate mode' => [
                0,
                [3, 3, 1108, -1, 8, 3, 4, 3, 99],
                9,
            ],
            'input less than 8 - true - immediate mode' => [
                1,
                [3, 3, 1107, -1, 8, 3, 4, 3, 99],
                7,
            ],
            'input less than 8 - false - immediate mode' => [
                0,
                [3, 3, 1107, -1, 8, 3, 4, 3, 99],
                8,
            ],
            'input non zero - true - position mode' => [
                1,
                [3, 12, 6, 12, 15, 1, 13, 14, 13, 4, 13, 99, -1, 0, 1, 9],
                1,
            ],
            'input non zero - false - position mode' => [
                0,
                [3, 12, 6, 12, 15, 1, 13, 14, 13, 4, 13, 99, -1, 0, 1, 9],
                0,
            ],
            'input non zero - true - immediate mode' => [
                1,
                [3, 3, 1105, -1, 9, 1101, 0, 0, 12, 4, 12, 99, 1],
                1,
            ],
            'input non zero - false - immediate mode' => [
                0,
                [3, 3, 1105, -1, 9, 1101, 0, 0, 12, 4, 12, 99, 1],
                0,
            ],
            'large example 1' => [
                999,
                [
                    3,21,1008,21,8,20,1005,20,22,107,8,21,20,
                    1006,20,31,1106,0,36,98,0,0,1002,21,125,
                    20,4,20, 1105,1,46,104, 999,1105,1,46,
                    1101,1000,1,20, 4,20,1105,1,46,98,99,
                ],
                7
            ],
            'large example 2' => [
                1000,
                [
                    3,21,1008,21,8,20,1005,20,22,107,8,21,20,
                    1006,20,31,1106,0,36,98,0,0,1002,21,125,
                    20,4,20, 1105,1,46,104, 999,1105,1,46,
                    1101,1000,1,20, 4,20,1105,1,46,98,99,
                ],
                8
            ],
            'large example 3' => [
                1001,
                [
                    3,21,1008,21,8,20,1005,20,22,107,8,21,20,
                    1006,20,31,1106,0,36,98,0,0,1002,21,125,
                    20,4,20, 1105,1,46,104, 999,1105,1,46,
                    1101,1000,1,20, 4,20,1105,1,46,98,99,
                ],
                9
            ],
        ];
    }

    /**
     * @dataProvider casesExecuteOutput
     */
    public function testExecuteInput(int $expected, array $data, int $input)
    {
        $actual = (new IntcodeComputer())->execute($data, $input)['outputs'];

        static::assertSame($expected, $actual);
    }

    public function casesGetParameter(): array
    {
        return [
            'position mode' => [
                10,
                [5,6,7,8,9,10],
                0,
                0,
            ],
            'immediate mode' => [
                5,
                [5,6,7,8,9,10],
                0,
                1,
            ],
            'unknown mode' => [
                null,
                [5,6,7,8,9,10],
                0,
                100,
            ],
        ];
    }

    /**
     * @dataProvider casesGetParameter
     */
    public function testGetParameter(?int $expected, array $data, int $index, int $mode)
    {
        $actual = (new IntcodeComputer())->setData($data)->getParameter($index, $mode);

        static::assertSame($expected, $actual);
    }

    public function casesParseInstruction(): array
    {
        return [
          'opCode and two parameters' => [
              [
                  'opCode' => '01',
                  'firstParameterMode' => '2',
                  'secondParameterMode' => '3',
              ],
              '3201',
          ],
            'only opCode' => [
                [
                    'opCode' => '01',
                    'firstParameterMode' => 0,
                    'secondParameterMode' => 0,
                ],
                '1',
            ],
        ];
    }

    /**
     * @dataProvider casesParseInstruction
     */
    public function testParseInstruction(array $expected, $input)
    {
        $actual = (new IntcodeComputer())->parseInstruction($input);

        static::assertSame($expected, $actual);
    }
}
