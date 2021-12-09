<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2021;

use Daviidxo\AdventOfCode\Year2021\Day03Solution;
use PHPUnit\Framework\TestCase;

class Day03SolutionTest extends TestCase
{

    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 2972336,
                    'taskB' => 3368358,
                ],
                __DIR__ . '/../../../../input/Year2021/day03.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day03Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Empty test' => [
                0,
                [],
            ],
            'Simple test' => [
                198,
                [
                    '00100',
                    '11110',
                    '10110',
                    '10111',
                    '10101',
                    '01111',
                    '00111',
                    '11100',
                    '10000',
                    '11001',
                    '00010',
                    '01010',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day03Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Empty test' => [
                0,
                [],
            ],
            'Simple test' => [
                230,
                [
                    '00100',
                    '11110',
                    '10110',
                    '10111',
                    '10101',
                    '01111',
                    '00111',
                    '11100',
                    '10000',
                    '11001',
                    '00010',
                    '01010',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day03Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
