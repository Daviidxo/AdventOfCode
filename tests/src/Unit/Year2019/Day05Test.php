<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2019;

use Daviidxo\AdventOfCode\Year2019\Day05Solution;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Daviidxo\AdventOfCode\Year2019\Day05Solution<extended>
 */
class Day05Test extends TestCase
{

    public function casesGetSolution()
    {
        return [
            'Given input' => [
                [
                    'taskA' => 7265618,
                    'taskB' => 7731427,
                ],
                __DIR__ . '/../../../../input/Year2019/day05.txt',
            ],
        ];
    }
//
//    /**
//     * @dataProvider casesGetSolution
//     */
//    public function testGetSolution(array $expected, string $input)
//    {
//        $actual = (new Day05Solution())->getSolution($input);
//
//        static::assertSame($expected, $actual);
//    }

    public function casesGetTaskA()
    {
        return [
            'example 1' => [
                1,
                [3,0,4,0,99],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day05Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }
}
