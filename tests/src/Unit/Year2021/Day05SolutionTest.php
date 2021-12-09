<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2021;

use Daviidxo\AdventOfCode\Year2021\Day05Solution;
use PHPUnit\Framework\TestCase;

class Day05SolutionTest extends TestCase
{

    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 6564,
                    'taskB' => 19172,
                ],
                __DIR__ . '/../../../../input/Year2021/day05.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day05Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Simple test' => [
                5,
                [
                    ['x1' => 0,'y1' => 9, 'x2' => 5, 'y2' => 9,],
                    ['x1' => 8,'y1' => 0, 'x2' => 0, 'y2' => 8,],
                    ['x1' => 9,'y1' => 4, 'x2' => 3, 'y2' => 4,],
                    ['x1' => 2,'y1' => 2, 'x2' => 2, 'y2' => 1,],
                    ['x1' => 7,'y1' => 0, 'x2' => 7, 'y2' => 4,],
                    ['x1' => 6,'y1' => 4, 'x2' => 2, 'y2' => 0,],
                    ['x1' => 0,'y1' => 9, 'x2' => 2, 'y2' => 9,],
                    ['x1' => 3,'y1' => 4, 'x2' => 1, 'y2' => 4,],
                    ['x1' => 0,'y1' => 0, 'x2' => 8, 'y2' => 8,],
                    ['x1' => 5,'y1' => 5, 'x2' => 8, 'y2' => 2,],
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day05Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                12,
                [
                    ['x1' => 0,'y1' => 9, 'x2' => 5, 'y2' => 9,],
                    ['x1' => 8,'y1' => 0, 'x2' => 0, 'y2' => 8,],
                    ['x1' => 9,'y1' => 4, 'x2' => 3, 'y2' => 4,],
                    ['x1' => 2,'y1' => 2, 'x2' => 2, 'y2' => 1,],
                    ['x1' => 7,'y1' => 0, 'x2' => 7, 'y2' => 4,],
                    ['x1' => 6,'y1' => 4, 'x2' => 2, 'y2' => 0,],
                    ['x1' => 0,'y1' => 9, 'x2' => 2, 'y2' => 9,],
                    ['x1' => 3,'y1' => 4, 'x2' => 1, 'y2' => 4,],
                    ['x1' => 0,'y1' => 0, 'x2' => 8, 'y2' => 8,],
                    ['x1' => 5,'y1' => 5, 'x2' => 8, 'y2' => 2,],
                ],
            ],
            'Single diagonal' => [
                3,
                [
                    ['x1' => 1,'y1' => 1, 'x2' => 3, 'y2' => 3,],
                    ['x1' => 1,'y1' => 1, 'x2' => 3, 'y2' => 3,],
                ],
            ],
            'Single diagonal type 2' => [
                3,
                [
                    ['x1' => 9,'y1' => 7, 'x2' => 7, 'y2' => 9,],
                    ['x1' => 9,'y1' => 7, 'x2' => 7, 'y2' => 9,],
                ],
            ],
            'Single row' => [
                3,
                [
                    ['x1' => 1,'y1' => 1, 'x2' => 1, 'y2' => 3,],
                    ['x1' => 1,'y1' => 1, 'x2' => 1, 'y2' => 3,],
                ],
            ],
            'Single row type 2' => [
                3,
                [
                    ['x1' => 9,'y1' => 7, 'x2' => 7, 'y2' => 7,],
                    ['x1' => 9,'y1' => 7, 'x2' => 7, 'y2' => 7,],
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day05Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
