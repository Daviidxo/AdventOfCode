<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2022;

use Daviidxo\AdventOfCode\Year2022\Day01Solution;
use PHPUnit\Framework\TestCase;

class Day01SolutionTest extends TestCase
{

    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 70698,
                    'taskB' => 206643,
                ],
                __DIR__ . '/../../../../input/Year2022/day01.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day01Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'empty test' => [
                0,
                [],
            ],
            'simple test' => [
                24000,
                [
                    [
                        1000,
                        2000,
                        3000,
                    ],
                    [
                        4000,
                    ],
                    [
                        5000,
                        6000,
                    ],
                    [
                        7000,
                        8000,
                        9000,
                    ],
                    [
                        10000,
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
        $actual = (new Day01Solution())->getTaskA($input);

        return static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'empty test' => [
                0,
                [],
            ],
            'simple test' => [
                45000,
                [
                    [
                        1000,
                        2000,
                        3000,
                    ],
                    [
                        4000,
                    ],
                    [
                        5000,
                        6000,
                    ],
                    [
                        7000,
                        8000,
                        9000,
                    ],
                    [
                        10000,
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
        $actual = (new Day01Solution())->getTaskB($input);

        return static::assertSame($expected, $actual);
    }
}
