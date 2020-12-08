<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2020;

use Daviidxo\AdventOfCode\Year2020\Day06Solution;
use PHPUnit\Framework\TestCase;

class Day06SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 6590,
                    'taskB' => 3288,
                ],
                __DIR__ . '/../../../../input/Year2020/day06.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day06Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Simple test' => [
                6,
                [
                    'abcx|abcy|abcz',
                ]
            ],
            'Simple test 2' => [
                11,
                [
                    'abc',
                    'a|b|c',
                    'ab|ac',
                    'a|a|a|a',
                    'b',
                ]
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day06Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                6,
                [
                    'abc',
                    'a|b|c',
                    'ab|ac',
                    'a|a|a|a',
                    'b',
                ]
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day06Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
