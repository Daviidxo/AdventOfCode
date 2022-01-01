<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2021;

use Daviidxo\AdventOfCode\Year2021\Day12Solution;
use PHPUnit\Framework\TestCase;

class Day12SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 4691,
                    'taskB' => 0,
                ],
                __DIR__ . '/../../../../input/Year2021/day12.txt',
            ],
        ];
    }
unction casesGetSolution(): array
{
return [
'Given input' => [
[
'taskA' => 4691,
'taskB' => 0,
],
__DIR__ . '/../../../../input/Year2021/day12.txt',
],
];
}

/**
 * @dataProvider casesGetSolution
 */
public function testGetSolution(array $expected, string $input)
{
    $actual = (new Day12Solution())->getSolution($input);

    static::assertSame($expected, $actual);
}

public function casesGetTaskA(): array
{
    return [
        'Simple test' => [
            10,
            [
                'start-A',
                'start-b',
                'A-c',
                'A-b',
                'b-d',
                'A-end',
                'b-end',
            ],
        ],
        'Larger test' => [
            19,
            [
                'dc-end',
                'HN-start',
                'start-kj',
                'dc-start',
                'dc-HN',
                'LN-dc',
                'HN-end',
                'kj-sa',
                'kj-HN',
                'kj-dc',
            ],
        ],
    ];
}

/**
 * @dataProvider casesGetTaskA
 */
public function testGetTaskA(int $expected, array $input)
{
    $actual = (new Day12Solution())->getTaskA($input);

    static::assertSame($expected, $actual);
}
    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day12Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Simple test' => [
                10,
                [
                    'start-A',
                    'start-b',
                    'A-c',
                    'A-b',
                    'b-d',
                    'A-end',
                    'b-end',
                ],
            ],
            'Larger test' => [
                19,
                [
                    'dc-end',
                    'HN-start',
                    'start-kj',
                    'dc-start',
                    'dc-HN',
                    'LN-dc',
                    'HN-end',
                    'kj-sa',
                    'kj-HN',
                    'kj-dc',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day12Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                3509,
                [
                    'dc-end',
                    'HN-start',
                    'start-kj',
                    'dc-start',
                    'dc-HN',
                    'LN-dc',
                    'HN-end',
                    'kj-sa',
                    'kj-HN',
                    'kj-dc',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day12Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
