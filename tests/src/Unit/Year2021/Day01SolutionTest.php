<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2021;

use Daviidxo\AdventOfCode\Year2021\Day01Solution;
use PHPUnit\Framework\TestCase;

class Day01SolutionTest extends TestCase
{

    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 1791,
                    'taskB' => 1822,
                ],
                __DIR__ . '/../../../../input/Year2021/day01.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day01Solution())->getSolution($input);

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
                7,
                [
                    199,
                    200,
                    208,
                    210,
                    200,
                    207,
                    240,
                    269,
                    260,
                    263,
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day01Solution())->getTaskA($input);

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
                5,
                [
                    199,
                    200,
                    208,
                    210,
                    200,
                    207,
                    240,
                    269,
                    260,
                    263,
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day01Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
