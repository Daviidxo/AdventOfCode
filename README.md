# Advent of Code 🎅🏻🎄🎁

![CircleCI](https://img.shields.io/circleci/build/github/Daviidxo/AdventOfCode?label=circleci)
![PHP](https://img.shields.io/github/languages/top/Daviidxo/AdventOfCode)

>Advent of Code is an Advent calendar of small programming puzzles for a variety of skill sets and skill levels that can be solved in any programming language you like.

This is my solution collection for Advent of Code written in PHP.

## How to use

Clone this repository
```shell
git clone git@github.com:Daviidxo/AdventOfCode.git
```

Go into the directory
```shell
cd AdventOfCode
```

Install dependencies
```shell
composer install
```

Use the following snippet
```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$solution = (new \Daviidxo\AdventOfCode\Year2021\Day01Solution())
    ->getSolution('./input/Year2021/day01.txt');

```
