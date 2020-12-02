<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2020;

use Daviidxo\AdventOfCode\Year2020\Day02Solution;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Daviidxo\AdventOfCode\Year2020\Day02Solution<extended>
 */
class Day02SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 458,
                    'taskB' => 342,
                ],
                __DIR__ . '/../../../../input/Year2020/day02.txt',
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
            'Simple test' => [
                2,
                [
                    '1-3 a: abcde',
                    '1-3 b: cdefg',
                    '2-9 c: ccccccccc',
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
            'Simple test' => [
                1,
                [
                    '1-3 a: abcde',
                    '1-3 b: cdefg',
                    '2-9 c: ccccccccc',
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
