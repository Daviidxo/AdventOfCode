<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit;

use Daviidxo\AdventOfCode\Year2019\Day01Solution;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Daviidxo\AdventOfCode\Year2019\Day01Solution<extended>
 */
class Day01Test extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 3216744,
                    'taskB' => 4822249,
                ],
                __DIR__ . '/../../../../input/Year2019/day01.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        var_dump($input);
        $actual = (new Day01Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesTaskA(): array
    {
        return [
            'example 1' => [
                2 + 2 + 654 + 33583,
                [
                    12,
                    14,
                    1969,
                    100756
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesTaskA
     */
    public function testTaskA(int $expected, array $data)
    {
        $actual = (new Day01Solution())->getTaskA($data);

        static::assertSame($expected, $actual);
    }

    public function casesTaskB(): array
    {
        return [
            'example 1' => [
                2,
                [14],
            ],
            'example 2' => [
                966,
                [1969],
            ],
            'example 3' => [
                50346,
                [100756],
            ],
        ];
    }

    /**
     * @dataProvider casesTaskB
     */
    public function testTaskB(int $expected, array $data)
    {
        $actual = (new Day01Solution())->getTaskB($data);

        static::assertSame($expected, $actual);
    }

    public function casesGetFuel(): array
    {
        return [
            'example 1' => [
                2,
                12,
            ],
            'example 2' => [
                2,
                14,
            ],
            'example 3' => [
                654,
                1969,
            ],
            'example 4' => [
                33583,
                100756,
            ],
        ];
    }

    /**
     * @dataProvider casesGetFuel
     */
    public function testGetFuel(int $expected, int $mass)
    {
        $actual = (new Day01Solution())->getFuelByMass($mass);

        static::assertSame($expected, $actual);
    }
}
