<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2020;

use Daviidxo\AdventOfCode\Year2020\Day10Solution;
use PHPUnit\Framework\TestCase;

class Day10SolutionTest extends TestCase
{

    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 2450,
                    'taskB' => 32396521357312,
                ],
                __DIR__ . '/../../../../input/Year2020/day10.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day10Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Simple test' => [
                35,
                [16, 10, 15, 5, 1, 11, 7, 19, 6, 12, 4],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $data)
    {
        $actual = (new Day10Solution())->getTaskA($data);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                8,
                [16, 10, 15, 5, 1, 11, 7, 19, 6, 12, 4],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $data)
    {
        $actual = (new Day10Solution())->getTaskB($data);

        static::assertSame($expected, $actual);
    }
}
