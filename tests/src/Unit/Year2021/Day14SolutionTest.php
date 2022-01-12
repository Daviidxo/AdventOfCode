<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2021;

use Daviidxo\AdventOfCode\Year2021\Day14Solution;
use PHPUnit\Framework\TestCase;

class Day14SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 2194,
                    'taskB' => 2360298895777,
                ],
                __DIR__ . '/../../../../input/Year2021/day14.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day14Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Simple test' => [
                1588,
                [
                    'template' => 'NNCB',
                    'pairMapping' => [
                        'CH' => 'B',
                        'HH' => 'N',
                        'CB' => 'H',
                        'NH' => 'C',
                        'HB' => 'C',
                        'HC' => 'B',
                        'HN' => 'C',
                        'NN' => 'C',
                        'BH' => 'H',
                        'NC' => 'B',
                        'NB' => 'B',
                        'BN' => 'B',
                        'BB' => 'N',
                        'BC' => 'B',
                        'CC' => 'N',
                        'CN' => 'C',
                    ],
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day14Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                2188189693529,
                [
                    'template' => 'NNCB',
                    'pairMapping' => [
                        'CH' => 'B',
                        'HH' => 'N',
                        'CB' => 'H',
                        'NH' => 'C',
                        'HB' => 'C',
                        'HC' => 'B',
                        'HN' => 'C',
                        'NN' => 'C',
                        'BH' => 'H',
                        'NC' => 'B',
                        'NB' => 'B',
                        'BN' => 'B',
                        'BB' => 'N',
                        'BC' => 'B',
                        'CC' => 'N',
                        'CN' => 'C',
                    ],
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day14Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
