<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit;

use Daviidxo\AdventOfCode\Year2019\Day04Solution;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Daviidxo\AdventOfCode\Year2019\Day04Solution<extended>
 */
class Day04Test extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 454,
                    'taskB' => 288,
                ],
                __DIR__ . '/../../../../input/Year2019/day04.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day04Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesIsNumberPossibleSuccess(): array
    {
        return [
            'Meets all criteria (double 11, never decreases).' => [
                true,
                111111,
            ],
            'Does not meet all criteria (decreasing pair of digits 50).' => [
                false,
                223450,
            ],
            'Does not meet all criteria (no double).' => [
                false,
                123789,
            ],
            'Meets all criteria' => [
                true,
                122345,
            ],
        ];
    }

    /**
     * @dataProvider casesIsNumberPossibleSuccess
     */
    public function testIsNumberPossibleSuccess(bool $expected, int $number)
    {
        $actual = (new Day04Solution())->isNumberPossible($number);

        static::assertSame($expected, $actual);
    }

    public function casesIsNumberPossibleFail(): array
    {
        return [
            'Digits less than 6' => [
                new \Exception('Number out of range'),
                12345,
            ],
            'Digits more than 6' => [
                new \Exception('Number out of range'),
                1234567,
            ],
        ];
    }

    /**
     * @dataProvider casesIsNumberPossibleFail
     */
    public function testIsNumberPossibleFail(\Exception $expected, int $number)
    {
        static::expectExceptionObject($expected);

        (new Day04Solution())->isNumberPossible($number);
    }

    public function casesIsSameNumberTwice(): array
    {
        return [
            'Number 1, six times, fail' => [
                false,
                111111,
            ],
            'Number 2, twice, correct' => [
                true,
                223450,
            ],
        ];
    }

    /**
     * @dataProvider casesIsSameNumberTwice
     */
    public function testIsSameNumberTwice(bool $expected, int $number)
    {
        $actual = (new Day04Solution())->isSameNumberTwice(str_split((string) $number));

        static::assertSame($expected, $actual);
    }
}
