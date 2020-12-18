<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2020;

use Daviidxo\AdventOfCode\Year2020\Day08Solution;
use PHPUnit\Framework\TestCase;

class Day08SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 1451,
                    'taskB' => 1160,
                ],
                __DIR__ . '/../../../../input/Year2020/day08.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day08Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Given input' => [
                5,
                [
                    'nop +0',
                    'acc +1',
                    'jmp +4',
                    'acc +3',
                    'jmp -3',
                    'acc -99',
                    'acc +1',
                    'jmp -4',
                    'acc +6',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day08Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Jmp to nop test 1' => [
                8,
                [
                    'nop +0',
                    'acc +1',
                    'jmp +4',
                    'acc +3',
                    'jmp -3',
                    'acc -99',
                    'acc +1',
                    'jmp -4',
                    'acc +6',
                ],
            ],
            'Jmp to nop test 2' => [
                3,
                [
                    'acc +1',
                    'acc +2',
                    'nop +6',
                    'jmp -2',
                    'acc +0',
                ],
            ],
            'Nop to jmp test' => [
                3,
                [
                    'acc +1',
                    'acc +2',
                    'nop +2',
                    'jmp -2',
                    'acc +0',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day08Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
