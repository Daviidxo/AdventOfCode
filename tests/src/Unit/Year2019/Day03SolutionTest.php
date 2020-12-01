<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2019;

use Daviidxo\AdventOfCode\Year2019\Day03Solution;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Daviidxo\AdventOfCode\Year2019\Day03Solution<extended>
 */
class Day03SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 5357,
                    'taskB' => 101956,
                ],
                __DIR__ . '/../../../../input/Year2019/day03.txt',
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
            'Example 1' => [
                6,
                [
                    ['R8','U5','L5','D3'],
                    ['U7','R6','D4','L4'],
                ],
            ],
            'Example 2' => [
                159,
                [
                    ['R75','D30','R83','U83','L12','D49','R71','U7','L72'],
                    ['U62','R66','U55','R34','D71','R55','D58','R83'],
                ]
            ],
            'Example 3' => [
                135,
                [
                    ['R98','U47','R26','D63','R33','U87','L62','D20','R33','U53','R51'],
                    ['U98','R91','D20','R16','D67','R40','U7','R15','U6','R7'],
                ]
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $wires)
    {
        $actual = (new Day03Solution())->getTaskA($wires);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Example 1' => [
                30,
                [
                    ['R8', 'U5', 'L5', 'D3'],
                    ['U7', 'R6', 'D4', 'L4'],
                ]
            ],
            'Example 2' => [
                610,
                [
                    ['R75', 'D30', 'R83', 'U83', 'L12', 'D49', 'R71', 'U7', 'L72'],
                    ['U62', 'R66', 'U55', 'R34', 'D71', 'R55', 'D58', 'R83'],
                ]
            ],
            'Example 3' => [
                410,
                [
                    ['R98', 'U47', 'R26', 'D63', 'R33', 'U87', 'L62', 'D20', 'R33', 'U53', 'R51'],
                    ['U98', 'R91', 'D20', 'R16', 'D67', 'R40', 'U7', 'R15', 'U6', 'R7'],
                ]
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $wires)
    {
        $actual = (new Day03Solution())->getTaskB($wires);

        static::assertSame($expected, $actual);
    }
}
