<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2020;

use Daviidxo\AdventOfCode\Year2020\Day09Solution;
use PHPUnit\Framework\TestCase;

class Day09SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 29221323,
                    'taskB' => 4389369,
                ],
                __DIR__ . '/../../../../input/Year2020/day09.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day09Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Simple input' => [
                65,
                [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 65],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $data)
    {
        $actual = (new Day09Solution())->getTaskA($data);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple input' => [
                15,
                [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 75],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $data)
    {
        $actual = (new Day09Solution())->getTaskB($data);

        static::assertSame($expected, $actual);
    }

    public function casesGetFirstInvalid(): array
    {
        return [
            'Simple input' => [
                127,
                [35, 20, 15, 25, 47, 40, 62, 55, 65, 95, 102, 117, 150, 182, 127, 219, 299, 277, 309, 576],
                5,
            ],
        ];
    }

    /**
     * @dataProvider casesGetFirstInvalid
     */
    public function testGetFirstInvalid(int $expected, array $data, int $preambleLength)
    {
        $actual = (new Day09Solution())->getFirstInvalid($data, $preambleLength);

        static::assertSame($expected, $actual);
    }
}
