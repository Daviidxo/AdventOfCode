<?php

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2021;

use Daviidxo\AdventOfCode\Year2021\Day10Solution;
use PHPUnit\Framework\TestCase;

class Day10SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 294195,
                    'taskB' => 3490802734,
                ],
                __DIR__ . '/../../../../input/Year2021/day10.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day10Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Simple test' => [
                26397,
                [
                    '[({(<(())[]>[[{[]{<()<>>',
                    '[(()[<>])]({[<{<<[]>>(',
                    '{([(<{}[<>[]}>{[]{[(<()>',
                    '(((({<>}<{<{<>}{[]{[]{}',
                    '[[<[([]))<([[{}[[()]]]',
                    '[{[{({}]{}}([{[{{{}}([]',
                    '{<[[]]>}<{[{[{[]{()[[[]',
                    '[<(<(<(<{}))><([]([]()',
                    '<{([([[(<>()){}]>(<<{{',
                    '<{([{{}}[<[[[<>{}]]]>[]]',
                ]
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day10Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                288957,
                [
                    '[({(<(())[]>[[{[]{<()<>>',
                    '[(()[<>])]({[<{<<[]>>(',
                    '{([(<{}[<>[]}>{[]{[(<()>',
                    '(((({<>}<{<{<>}{[]{[]{}',
                    '[[<[([]))<([[{}[[()]]]',
                    '[{[{({}]{}}([{[{{{}}([]',
                    '{<[[]]>}<{[{[{[]{()[[[]',
                    '[<(<(<(<{}))><([]([]()',
                    '<{([([[(<>()){}]>(<<{{',
                    '<{([{{}}[<[[[<>{}]]]>[]]',
                ]
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day10Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
