<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2022;

use Daviidxo\AdventOfCode\Year2022\Day02Solution;
use PHPUnit\Framework\TestCase;

class Day02SolutionTest extends TestCase
{

    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 9177,
                    'taskB' => 12111,
                ],
                __DIR__ . '/../../../../input/Year2022/day02.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day02Solution())->getSolution($input);

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
                15,
                [
                    'A Y',
                    'B X',
                    'C Z',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day02Solution())->getTaskA($input);

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
                12,
                [
                    'A Y',
                    'B X',
                    'C Z',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day02Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
