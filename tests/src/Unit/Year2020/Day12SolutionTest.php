<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2020;

use Daviidxo\AdventOfCode\Year2020\Day12Solution;
use PHPUnit\Framework\TestCase;

class Day12SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 0,
                    'taskB' => 0,
                ],
                __DIR__ . '/../../../../input/Year2020/day12.txt',
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

    public function casesTestGetTaskA(): array
    {
        return [
            'Simple input' => [
                25,
                [
                    'F10',
                    'N3',
                    'F7',
                    'R90',
                    'F11',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesTestGetTaskA
     */
    public function testGetTaskA(int $expected, array $data)
    {
        $actual = (new Day12Solution())->getTaskA($data);

        static::assertSame($expected, $actual);
    }
}
