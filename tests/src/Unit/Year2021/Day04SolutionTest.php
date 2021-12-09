<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2021;

use Daviidxo\AdventOfCode\Year2021\Day04Solution;
use PHPUnit\Framework\TestCase;

class Day04SolutionTest extends TestCase
{

    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 2745,
                    'taskB' => 6594,
                ],
                __DIR__ . '/../../../../input/Year2021/day04.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day04Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Simple test' => [
                4512,
                [
                    'numbers' => [
                        7, 4, 9, 5, 11, 17, 23, 2, 0, 14, 21, 24, 10, 16,
                        13, 6, 15, 25, 12, 22, 18, 20, 8, 19, 3, 26, 1,
                    ],
                    'boards' => [
                        [
                            [22, 13, 17, 11, 0,],
                            [8, 2, 23, 4, 24,],
                            [21, 9, 14, 16, 7,],
                            [6, 10, 3, 18, 5,],
                            [1, 12, 20, 15, 19,],
                        ],
                        [
                            [3, 15, 0, 2, 22,],
                            [9, 18, 13, 17, 5,],
                            [19, 8, 7, 25, 23,],
                            [20, 11, 10, 24, 4,],
                            [14, 21, 16, 12, 6,],
                        ],
                        [
                            [14, 21, 17, 24, 4,],
                            [10, 16, 15, 9, 19,],
                            [18, 8, 23, 26, 20,],
                            [22, 11, 13, 6, 5,],
                            [2, 0, 12, 3, 7,],
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day04Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                1924,
                [
                    'numbers' => [
                        7, 4, 9, 5, 11, 17, 23, 2, 0, 14, 21, 24, 10, 16,
                        13, 6, 15, 25, 12, 22, 18, 20, 8, 19, 3, 26, 1,
                    ],
                    'boards' => [
                        [
                            [22, 13, 17, 11, 0,],
                            [8, 2, 23, 4, 24,],
                            [21, 9, 14, 16, 7,],
                            [6, 10, 3, 18, 5,],
                            [1, 12, 20, 15, 19,],
                        ],
                        [
                            [3, 15, 0, 2, 22,],
                            [9, 18, 13, 17, 5,],
                            [19, 8, 7, 25, 23,],
                            [20, 11, 10, 24, 4,],
                            [14, 21, 16, 12, 6,],
                        ],
                        [
                            [14, 21, 17, 24, 4,],
                            [10, 16, 15, 9, 19,],
                            [18, 8, 23, 26, 20,],
                            [22, 11, 13, 6, 5,],
                            [2, 0, 12, 3, 7,],
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day04Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
