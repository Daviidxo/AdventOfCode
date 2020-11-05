<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit;

use Daviidxo\AdventOfCode\Year2019\Day02Solution;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Daviidxo\AdventOfCode\Year2019\Day02Solution<extended>
 */
class Day02Test extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 2894520,
                    'taskB' => 9342,
                ],
                __DIR__ . '/../../../../input/Year2019/day02.txt',
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
}
