<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2022;

use Daviidxo\AdventOfCode\Year2022\Day03Solution;
use PHPUnit\Framework\TestCase;

class Day03SolutionTest extends TestCase
{

    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 7727,
                    'taskB' => 0,
                ],
                __DIR__ . '/../../../../input/Year2022/day03.txt',
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
            'empty test' => [
                0,
                [],
            ],
            'simple test' => [
                157,
                [
                    'vJrwpWtwJgWrhcsFMMfFFhFp',
                    'jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL',
                    'PmmdzqPrVvPwwTWBwg',
                    'wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn',
                    'ttgJtRGJQctTZtZT',
                    'CrZsJsPPZsGzwwsLwLmpwMDw',
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
            'empty test' => [
                0,
                [],
            ],
            'simple test' => [
                70,
                [
                    'vJrwpWtwJgWrhcsFMMfFFhFp',
                    'jqHRNqRjqzjGDLGLrsFMfFZSrLrFZsSL',
                    'PmmdzqPrVvPwwTWBwg',
                    'wMqvLMZHhHMvwLHjbvcjnnSBnvTQFn',
                    'ttgJtRGJQctTZtZT',
                    'CrZsJsPPZsGzwwsLwLmpwMDw',
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
