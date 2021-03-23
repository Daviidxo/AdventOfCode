<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2020;

use Daviidxo\AdventOfCode\Year2020\Day11Solution;
use PHPUnit\Framework\TestCase;

class Day11SolutionTest extends TestCase
{

    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 2164,
                    'taskB' => 1974,
                ],
                __DIR__ . '/../../../../input/Year2020/day11.txt',
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
                37,
                [
                    ['L', '.', 'L', 'L', '.', 'L', 'L', '.', 'L', 'L'],
                    ['L', 'L', 'L', 'L', 'L', 'L', 'L', '.', 'L', 'L'],
                    ['L', '.', 'L', '.', 'L', '.', '.', 'L', '.', '.'],
                    ['L', 'L', 'L', 'L', '.', 'L', 'L', '.', 'L', 'L'],
                    ['L', '.', 'L', 'L', '.', 'L', 'L', '.', 'L', 'L'],
                    ['L', '.', 'L', 'L', 'L', 'L', 'L', '.', 'L', 'L'],
                    ['.', '.', 'L', '.', 'L', '.', '.', '.', '.', '.'],
                    ['L', 'L', 'L', 'L', 'L', 'L', 'L', 'L', 'L', 'L'],
                    ['L', '.', 'L', 'L', 'L', 'L', 'L', 'L', '.', 'L'],
                    ['L', '.', 'L', 'L', 'L', 'L', 'L', '.', 'L', 'L'],
                ]
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $data)
    {
        $actual = (new Day11Solution())->getTaskA($data);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                26,
                [
                    ['L', '.', 'L', 'L', '.', 'L', 'L', '.', 'L', 'L'],
                    ['L', 'L', 'L', 'L', 'L', 'L', 'L', '.', 'L', 'L'],
                    ['L', '.', 'L', '.', 'L', '.', '.', 'L', '.', '.'],
                    ['L', 'L', 'L', 'L', '.', 'L', 'L', '.', 'L', 'L'],
                    ['L', '.', 'L', 'L', '.', 'L', 'L', '.', 'L', 'L'],
                    ['L', '.', 'L', 'L', 'L', 'L', 'L', '.', 'L', 'L'],
                    ['.', '.', 'L', '.', 'L', '.', '.', '.', '.', '.'],
                    ['L', 'L', 'L', 'L', 'L', 'L', 'L', 'L', 'L', 'L'],
                    ['L', '.', 'L', 'L', 'L', 'L', 'L', 'L', '.', 'L'],
                    ['L', '.', 'L', 'L', 'L', 'L', 'L', '.', 'L', 'L'],
                ]
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $data)
    {
        $actual = (new Day11Solution())->getTaskB($data);

        static::assertSame($expected, $actual);
    }
}
