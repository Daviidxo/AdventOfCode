<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit;

use Daviidxo\AdventOfCode\Year2019\Day02Solution;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Daviidxo\AdventOfCode\Year2019\Day02Solution<extended>
 */
class Day02Test extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 2894520,
                    'taskB' => 9342,
                ],
                __DIR__ . '/../../../../input/Year2019/day02.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day02Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesExecuteIntcodeProgram(): array
    {
        return [
            'example 1' => [
                [2,0,0,0,99],
                [1,0,0,0,99],
            ],
            'example 2' => [
                [2,3,0,6,99],
                [2,3,0,3,99],
            ],
            'example 3' => [
                [2,4,4,5,99,9801],
                [2,4,4,5,99,0],
            ],
            'example 4' => [
                [30,1,1,4,2,5,6,0,99],
                [1,1,1,4,99,5,6,0,99],
            ],
        ];
    }

    /**
     * @dataProvider casesExecuteIntcodeProgram
     */
    public function testExecuteIntcodeProgram(array $expected, array $data)
    {
        $actual = (new Day02Solution())->executeIntcodeProgram($data);

        static::assertSame($expected, $actual);
    }
}
