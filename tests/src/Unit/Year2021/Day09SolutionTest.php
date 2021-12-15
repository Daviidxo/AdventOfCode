<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2021;

use Daviidxo\AdventOfCode\Year2021\Day09Solution;
use PHPUnit\Framework\TestCase;

class Day09SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 465,
                    'taskB' => 1269555,
                ],
                __DIR__ . '/../../../../input/Year2021/day09.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day09Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Simple test' => [
                15,
                [
                    ['2', '1', '9', '9', '9', '4', '3', '2', '1', '0',],
                    ['3', '9', '8', '7', '8', '9', '4', '9', '2', '1',],
                    ['9', '8', '5', '6', '7', '8', '9', '8', '9', '2',],
                    ['8', '7', '6', '7', '8', '9', '6', '7', '8', '9',],
                    ['9', '8', '9', '9', '9', '6', '5', '6', '7', '8',],
                ]
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day09Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                1134,
                [
                    ['2', '1', '9', '9', '9', '4', '3', '2', '1', '0',],
                    ['3', '9', '8', '7', '8', '9', '4', '9', '2', '1',],
                    ['9', '8', '5', '6', '7', '8', '9', '8', '9', '2',],
                    ['8', '7', '6', '7', '8', '9', '6', '7', '8', '9',],
                    ['9', '8', '9', '9', '9', '6', '5', '6', '7', '8',],
                ]
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day09Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
