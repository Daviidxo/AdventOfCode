<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2021;

use Daviidxo\AdventOfCode\Year2021\Day07Solution;
use PHPUnit\Framework\TestCase;

class Day07SolutionTest extends TestCase
{

    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 355521,
                    'taskB' => 100148777,
                ],
                __DIR__ . '/../../../../input/Year2021/day07.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day07Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Simple test' => [
                37,
                [16, 1, 2, 0, 4, 2, 7, 1, 2, 14],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day07Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                170,
                [16, 1, 2, 0, 4, 2, 7, 1, 2, 14],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day07Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
