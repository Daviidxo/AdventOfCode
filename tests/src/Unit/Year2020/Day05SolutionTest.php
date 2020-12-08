<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2020;

use Daviidxo\AdventOfCode\Year2020\Day05Solution;
use PHPUnit\Framework\TestCase;

class Day05SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 947,
                    'taskB' => 636,
                ],
                __DIR__ . '/../../../../input/Year2020/day05.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day05Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetSeatId(): array
    {
        return [
            'Simple test one' => [
                567,
                'BFFFBBFRRR',
            ],
            'Simple test two' => [
                119,
                'FFFBBBFRRR',
            ],
            'Simple test three' => [
                820,
                'BBFFBBFRLL',
            ],
            'Simple test four' => [
                357,
                'FBFBBFFRLR',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSeatId
     */
    public function testGetSeatId(int $expected, string $boardingPass)
    {
        $actual = (new Day05Solution())->getSeatId($boardingPass);

        static::assertSame($expected, $actual);
    }

}
