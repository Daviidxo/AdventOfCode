<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2021;

use Daviidxo\AdventOfCode\Year2021\Day11Solution;
use PHPUnit\Framework\TestCase;

class Day11SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 1735,
                    'taskB' => 400,
                ],
                __DIR__ . '/../../../../input/Year2021/day11.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day11Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Simple test' => [
                1656,
                [
                    [5, 4, 8, 3, 1, 4, 3, 2, 2, 3,],
                    [2, 7, 4, 5, 8, 5, 4, 7, 1, 1,],
                    [5, 2, 6, 4, 5, 5, 6, 1, 7, 3,],
                    [6, 1, 4, 1, 3, 3, 6, 1, 4, 6,],
                    [6, 3, 5, 7, 3, 8, 5, 4, 7, 8,],
                    [4, 1, 6, 7, 5, 2, 4, 6, 4, 5,],
                    [2, 1, 7, 6, 8, 4, 1, 7, 2, 1,],
                    [6, 8, 8, 2, 8, 8, 1, 1, 3, 4,],
                    [4, 8, 4, 6, 8, 4, 8, 5, 5, 4,],
                    [5, 2, 8, 3, 7, 5, 1, 5, 2, 6,],
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day11Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                195,
                [
                    [5, 4, 8, 3, 1, 4, 3, 2, 2, 3,],
                    [2, 7, 4, 5, 8, 5, 4, 7, 1, 1,],
                    [5, 2, 6, 4, 5, 5, 6, 1, 7, 3,],
                    [6, 1, 4, 1, 3, 3, 6, 1, 4, 6,],
                    [6, 3, 5, 7, 3, 8, 5, 4, 7, 8,],
                    [4, 1, 6, 7, 5, 2, 4, 6, 4, 5,],
                    [2, 1, 7, 6, 8, 4, 1, 7, 2, 1,],
                    [6, 8, 8, 2, 8, 8, 1, 1, 3, 4,],
                    [4, 8, 4, 6, 8, 4, 8, 5, 5, 4,],
                    [5, 2, 8, 3, 7, 5, 1, 5, 2, 6,],
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day11Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
