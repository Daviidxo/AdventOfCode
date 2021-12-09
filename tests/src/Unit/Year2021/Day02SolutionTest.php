<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2021;

use Daviidxo\AdventOfCode\Year2021\Day02Solution;
use PHPUnit\Framework\TestCase;

class Day02SolutionTest extends TestCase
{

    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 1936494,
                    'taskB' => 1997106066,
                ],
                __DIR__ . '/../../../../input/Year2021/day02.txt',
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
            'Empty test' => [
                0,
                [],
            ],
            'Simple test' => [
                150,
                [
                    'forward 5',
                    'down 5',
                    'forward 8',
                    'up 3',
                    'down 8',
                    'forward 2',
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
            'Empty test' => [
                0,
                [],
            ],
            'Simple test' => [
                900,
                [
                    'forward 5',
                    'down 5',
                    'forward 8',
                    'up 3',
                    'down 8',
                    'forward 2',
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
