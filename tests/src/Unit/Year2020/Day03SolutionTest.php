<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2020;

use Daviidxo\AdventOfCode\Year2020\Day03Solution;
use PHPUnit\Framework\TestCase;

class Day03SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 205,
                    'taskB' => 3952146825,
                ],
                __DIR__ . '/../../../../input/Year2020/day03.txt',
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

    public function casesTestGetTaskA(): array
    {
        return [
            'Simple test' => [
                7,
                [
                    '..##.........##.........##.........##.........##.........##.......',
                    '#...#...#..#...#...#..#...#...#..#...#...#..#...#...#..#...#...#..',
                    '.#....#..#..#....#..#..#....#..#..#....#..#..#....#..#..#....#..#.',
                    '..#.#...#.#..#.#...#.#..#.#...#.#..#.#...#.#..#.#...#.#..#.#...#.#',
                    '.#...##..#..#...##..#..#...##..#..#...##..#..#...##..#..#...##..#.',
                    '..#.##.......#.##.......#.##.......#.##.......#.##.......#.##.....',
                    '.#.#.#....#.#.#.#....#.#.#.#....#.#.#.#....#.#.#.#....#.#.#.#....#',
                    '.#........#.#........#.#........#.#........#.#........#.#........#',
                    '#.##...#...#.##...#...#.##...#...#.##...#...#.##...#...#.##...#...',
                    '#...##....##...##....##...##....##...##....##...##....##...##....#',
                    '.#..#...#.#.#..#...#.#.#..#...#.#.#..#...#.#.#..#...#.#.#..#...#.#',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesTestGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day03Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesTestGetTaskB(): array
    {
        return [
            'Simple test' => [
                336,
                [
                    '..##.........##.........##.........##.........##.........##.......',
                    '#...#...#..#...#...#..#...#...#..#...#...#..#...#...#..#...#...#..',
                    '.#....#..#..#....#..#..#....#..#..#....#..#..#....#..#..#....#..#.',
                    '..#.#...#.#..#.#...#.#..#.#...#.#..#.#...#.#..#.#...#.#..#.#...#.#',
                    '.#...##..#..#...##..#..#...##..#..#...##..#..#...##..#..#...##..#.',
                    '..#.##.......#.##.......#.##.......#.##.......#.##.......#.##.....',
                    '.#.#.#....#.#.#.#....#.#.#.#....#.#.#.#....#.#.#.#....#.#.#.#....#',
                    '.#........#.#........#.#........#.#........#.#........#.#........#',
                    '#.##...#...#.##...#...#.##...#...#.##...#...#.##...#...#.##...#...',
                    '#...##....##...##....##...##....##...##....##...##....##...##....#',
                    '.#..#...#.#.#..#...#.#.#..#...#.#.#..#...#.#.#..#...#.#.#..#...#.#',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesTestGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day03Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
