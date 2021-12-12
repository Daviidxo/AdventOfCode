<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2021;

use Daviidxo\AdventOfCode\Year2021\Day08Solution;
use PHPUnit\Framework\TestCase;

class Day08SolutionTest extends TestCase
{

    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 412,
                    'taskB' => 978171,
                ],
                __DIR__ . '/../../../../input/Year2021/day08.txt',
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
            'Simple test' => [
                26,
                [
                    [
                        'digits' =>
                            [
                                'be',
                                'cfbegad',
                                'cbdgef',
                                'fgaecd',
                                'cgeb',
                                'fdcge',
                                'agebfd',
                                'fecdb',
                                'fabcd',
                                'edb',
                            ],
                        'outputs' =>
                            [
                                'fdgacbe',
                                'cefdb',
                                'cefbgd',
                                'gcbe',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'edbfga',
                                'begcd',
                                'cbg',
                                'gc',
                                'gcadebf',
                                'fbgde',
                                'acbgfd',
                                'abcde',
                                'gfcbed',
                                'gfec',
                            ],
                        'outputs' =>
                            [
                                'fcgedb',
                                'cgb',
                                'dgebacf',
                                'gc',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'fgaebd',
                                'cg',
                                'bdaec',
                                'gdafb',
                                'agbcfd',
                                'gdcbef',
                                'bgcad',
                                'gfac',
                                'gcb',
                                'cdgabef',
                            ],
                        'outputs' =>
                            [
                                'cg',
                                'cg',
                                'fdcagb',
                                'cbg',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'fbegcd',
                                'cbd',
                                'adcefb',
                                'dageb',
                                'afcb',
                                'bc',
                                'aefdc',
                                'ecdab',
                                'fgdeca',
                                'fcdbega',
                            ],
                        'outputs' =>
                            [
                                'efabcd',
                                'cedba',
                                'gadfec',
                                'cb',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'aecbfdg',
                                'fbg',
                                'gf',
                                'bafeg',
                                'dbefa',
                                'fcge',
                                'gcbea',
                                'fcaegb',
                                'dgceab',
                                'fcbdga',
                            ],
                        'outputs' =>
                            [
                                'gecf',
                                'egdcabf',
                                'bgf',
                                'bfgea',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'fgeab',
                                'ca',
                                'afcebg',
                                'bdacfeg',
                                'cfaedg',
                                'gcfdb',
                                'baec',
                                'bfadeg',
                                'bafgc',
                                'acf',
                            ],
                        'outputs' =>
                            [
                                'gebdcfa',
                                'ecba',
                                'ca',
                                'fadegcb',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'dbcfg',
                                'fgd',
                                'bdegcaf',
                                'fgec',
                                'aegbdf',
                                'ecdfab',
                                'fbedc',
                                'dacgb',
                                'gdcebf',
                                'gf',
                            ],
                        'outputs' =>
                            [
                                'cefg',
                                'dcbef',
                                'fcge',
                                'gbcadfe',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'bdfegc',
                                'cbegaf',
                                'gecbf',
                                'dfcage',
                                'bdacg',
                                'ed',
                                'bedf',
                                'ced',
                                'adcbefg',
                                'gebcd',
                            ],
                        'outputs' =>
                            [
                                'ed',
                                'bcgafe',
                                'cdgba',
                                'cbgef',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'egadfb',
                                'cdbfeg',
                                'cegd',
                                'fecab',
                                'cgb',
                                'gbdefca',
                                'cg',
                                'fgcdab',
                                'egfdb',
                                'bfceg',
                            ],
                        'outputs' =>
                            [
                                'gbdfcae',
                                'bgc',
                                'cg',
                                'cgb',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'gcafb',
                                'gcf',
                                'dcaebfg',
                                'ecagb',
                                'gf',
                                'abcdeg',
                                'gaef',
                                'cafbge',
                                'fdbac',
                                'fegbdc',
                            ],
                        'outputs' =>
                            [
                                'fgae',
                                'cfgab',
                                'fg',
                                'bagce',
                            ],
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
        $actual = (new Day08Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                5353,
                [
                    [
                        'digits' =>
                            [
                                'acedgfb',
                                'cdfbe',
                                'gcdfa',
                                'fbcad',
                                'dab',
                                'cefabd',
                                'cdfgeb',
                                'eafb',
                                'cagedb',
                                'ab',
                            ],
                        'outputs' =>
                            [
                                'cdfeb',
                                'fcadb',
                                'cdfeb',
                                'cdbaf',
                            ],
                    ],
                ],
            ],
            'Multiple rows test' => [
                61229,
                [
                    [
                        'digits' =>
                            [
                                'be',
                                'cfbegad',
                                'cbdgef',
                                'fgaecd',
                                'cgeb',
                                'fdcge',
                                'agebfd',
                                'fecdb',
                                'fabcd',
                                'edb',
                            ],
                        'outputs' =>
                            [
                                'fdgacbe',
                                'cefdb',
                                'cefbgd',
                                'gcbe',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'edbfga',
                                'begcd',
                                'cbg',
                                'gc',
                                'gcadebf',
                                'fbgde',
                                'acbgfd',
                                'abcde',
                                'gfcbed',
                                'gfec',
                            ],
                        'outputs' =>
                            [
                                'fcgedb',
                                'cgb',
                                'dgebacf',
                                'gc',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'fgaebd',
                                'cg',
                                'bdaec',
                                'gdafb',
                                'agbcfd',
                                'gdcbef',
                                'bgcad',
                                'gfac',
                                'gcb',
                                'cdgabef',
                            ],
                        'outputs' =>
                            [
                                'cg',
                                'cg',
                                'fdcagb',
                                'cbg',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'fbegcd',
                                'cbd',
                                'adcefb',
                                'dageb',
                                'afcb',
                                'bc',
                                'aefdc',
                                'ecdab',
                                'fgdeca',
                                'fcdbega',
                            ],
                        'outputs' =>
                            [
                                'efabcd',
                                'cedba',
                                'gadfec',
                                'cb',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'aecbfdg',
                                'fbg',
                                'gf',
                                'bafeg',
                                'dbefa',
                                'fcge',
                                'gcbea',
                                'fcaegb',
                                'dgceab',
                                'fcbdga',
                            ],
                        'outputs' =>
                            [
                                'gecf',
                                'egdcabf',
                                'bgf',
                                'bfgea',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'fgeab',
                                'ca',
                                'afcebg',
                                'bdacfeg',
                                'cfaedg',
                                'gcfdb',
                                'baec',
                                'bfadeg',
                                'bafgc',
                                'acf',
                            ],
                        'outputs' =>
                            [
                                'gebdcfa',
                                'ecba',
                                'ca',
                                'fadegcb',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'dbcfg',
                                'fgd',
                                'bdegcaf',
                                'fgec',
                                'aegbdf',
                                'ecdfab',
                                'fbedc',
                                'dacgb',
                                'gdcebf',
                                'gf',
                            ],
                        'outputs' =>
                            [
                                'cefg',
                                'dcbef',
                                'fcge',
                                'gbcadfe',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'bdfegc',
                                'cbegaf',
                                'gecbf',
                                'dfcage',
                                'bdacg',
                                'ed',
                                'bedf',
                                'ced',
                                'adcbefg',
                                'gebcd',
                            ],
                        'outputs' =>
                            [
                                'ed',
                                'bcgafe',
                                'cdgba',
                                'cbgef',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'egadfb',
                                'cdbfeg',
                                'cegd',
                                'fecab',
                                'cgb',
                                'gbdefca',
                                'cg',
                                'fgcdab',
                                'egfdb',
                                'bfceg',
                            ],
                        'outputs' =>
                            [
                                'gbdfcae',
                                'bgc',
                                'cg',
                                'cgb',
                            ],
                    ],
                    [
                        'digits' =>
                            [
                                'gcafb',
                                'gcf',
                                'dcaebfg',
                                'ecagb',
                                'gf',
                                'abcdeg',
                                'gaef',
                                'cafbge',
                                'fdbac',
                                'fegbdc',
                            ],
                        'outputs' =>
                            [
                                'fgae',
                                'cfgab',
                                'fg',
                                'bagce',
                            ],
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
        $actual = (new Day08Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
