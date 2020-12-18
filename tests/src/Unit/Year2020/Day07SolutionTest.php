<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2020;

use Daviidxo\AdventOfCode\Year2020\Day07Solution;
use PHPUnit\Framework\TestCase;

class Day07SolutionTest extends TestCase
{
    public function casesGetSolution(): array
    {
        return [
            'Given input' => [
                [
                    'taskA' => 355,
                    'taskB' => 5312,
                ],
                __DIR__ . '/../../../../input/Year2020/day07.txt',
            ],
        ];
    }

    /**
     * @dataProvider casesGetSolution
     */
    public function testGetSolution(array $expected, string $input)
    {
        $actual = (new Day07Solution())->getSolution($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskA(): array
    {
        return [
            'Simple test' => [
                4,
                [
                    'light red bags contain 1 bright white bag, 2 muted yellow bags.',
                    'dark orange bags contain 3 bright white bags, 4 muted yellow bags.',
                    'bright white bags contain 1 shiny gold bag.',
                    'muted yellow bags contain 2 shiny gold bags, 9 faded blue bags.',
                    'shiny gold bags contain 1 dark olive bag, 2 vibrant plum bags.',
                    'dark olive bags contain 3 faded blue bags, 4 dotted black bags.',
                    'vibrant plum bags contain 5 faded blue bags, 6 dotted black bags.',
                    'faded blue bags contain no other bags.',
                    'dotted black bags contain no other bags.',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskA
     */
    public function testGetTaskA(int $expected, array $input)
    {
        $actual = (new Day07Solution())->getTaskA($input);

        static::assertSame($expected, $actual);
    }

    public function casesGetTaskB(): array
    {
        return [
            'Simple test' => [
                32,
                [
                    'light red bags contain 1 bright white bag, 2 muted yellow bags.',
                    'dark orange bags contain 3 bright white bags, 4 muted yellow bags.',
                    'bright white bags contain 1 shiny gold bag.',
                    'muted yellow bags contain 2 shiny gold bags, 9 faded blue bags.',
                    'shiny gold bags contain 1 dark olive bag, 2 vibrant plum bags.',
                    'dark olive bags contain 3 faded blue bags, 4 dotted black bags.',
                    'vibrant plum bags contain 5 faded blue bags, 6 dotted black bags.',
                    'faded blue bags contain no other bags.',
                    'dotted black bags contain no other bags.',
                ]
            ],
            'Simple test 2' => [
                126,
                [
                    'shiny gold bags contain 2 dark red bags.',
                    'dark red bags contain 2 dark orange bags.',
                    'dark orange bags contain 2 dark yellow bags.',
                    'dark yellow bags contain 2 dark green bags.',
                    'dark green bags contain 2 dark blue bags.',
                    'dark blue bags contain 2 dark violet bags.',
                    'dark violet bags contain no other bags.',
                ],
            ],
        ];
    }

    /**
     * @dataProvider casesGetTaskB
     */
    public function testGetTaskB(int $expected, array $input)
    {
        $actual = (new Day07Solution())->getTaskB($input);

        static::assertSame($expected, $actual);
    }
}
