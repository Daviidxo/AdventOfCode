<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2021;

use Daviidxo\AdventOfCode\Year2021\Day13Solution;
use PHPUnit\Framework\TestCase;

class Day13SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 716,
                    'taskB' => 97,
                ],
                __DIR__ . '/../../../../input/Year2021/day13.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day13Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Simple test' => [
                17,
                [
                    'dots' => [
                        ['x' => 6, 'y' => 10],
                        ['x' => 0, 'y' => 14],
                        ['x' => 9, 'y' => 10],
                        ['x' => 0, 'y' => 3],
                        ['x' => 10, 'y' => 4],
                        ['x' => 4, 'y' => 11],
                        ['x' => 6, 'y' => 0],
                        ['x' => 6, 'y' => 12],
                        ['x' => 4, 'y' => 1],
                        ['x' => 0, 'y' => 13],
                        ['x' => 10, 'y' => 12],
                        ['x' => 3, 'y' => 4],
                        ['x' => 3, 'y' => 0],
                        ['x' => 8, 'y' => 4],
                        ['x' => 1, 'y' => 10],
                        ['x' => 2, 'y' => 14],
                        ['x' => 8, 'y' => 10],
                        ['x' => 9, 'y' => 0],
                    ],
                    'folds' => [
                      ['direction' => 'y', 'value' => 7],
                      ['direction' => 'x', 'value' => 5],
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
        $actual = (new Day13Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                16,
                [
                    'dots' => [
                        ['x' => 6, 'y' => 10],
                        ['x' => 0, 'y' => 14],
                        ['x' => 9, 'y' => 10],
                        ['x' => 0, 'y' => 3],
                        ['x' => 10, 'y' => 4],
                        ['x' => 4, 'y' => 11],
                        ['x' => 6, 'y' => 0],
                        ['x' => 6, 'y' => 12],
                        ['x' => 4, 'y' => 1],
                        ['x' => 0, 'y' => 13],
                        ['x' => 10, 'y' => 12],
                        ['x' => 3, 'y' => 4],
                        ['x' => 3, 'y' => 0],
                        ['x' => 8, 'y' => 4],
                        ['x' => 1, 'y' => 10],
                        ['x' => 2, 'y' => 14],
                        ['x' => 8, 'y' => 10],
                        ['x' => 9, 'y' => 0],
                    ],
                    'folds' => [
                        ['direction' => 'y', 'value' => 7],
                        ['direction' => 'x', 'value' => 5],
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
        $actual = (new Day13Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
