<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Tests\Unit\Year2019;

use Daviidxo\AdventOfCode\Year2019\IntcodeComputer;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Daviidxo\AdventOfCode\Year2019\IntcodeComputer<extended>
 */
class IntcodeComputerTest extends TestCase
{

    public function casesExecute(): array
    {
        return [
            'example 1' => [
                [2,0,0,0,99],
                [1,0,0,0,99],
            ],
            'example 2' => [
                [2,3,0,6,99],
                [2,3,0,3,99],
            ],
            'example 3' => [
                [2,4,4,5,99,9801],
                [2,4,4,5,99,0],
            ],
            'example 4' => [
                [30,1,1,4,2,5,6,0,99],
                [1,1,1,4,99,5,6,0,99],
            ],
        ];
    }

    /**
     * @dataProvider casesExecute
     */
    public function testExecute(array $expected, array $data)
    {
        $actual = (new IntcodeComputer())->execute($data);

        static::assertSame($expected, $actual);
    }
}
