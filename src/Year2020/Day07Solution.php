<?php

declare(strict_types=1);

namespace Daviidxo\AdventOfCode\Year2020;

use Daviidxo\AdventOfCode\SolutionBase;

class Day07Solution extends SolutionBase
{
    /**
     * @var array
     */
    protected $bags = [];

    public function getBags(): array
    {
        return $this->bags;
    }

    public function setBags(array $bags)
    {
        $this->bags = $bags;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSolution(string $input): array
    {
        $data = file($input, FILE_IGNORE_NEW_LINES);

        return [
            'taskA' => $this->getTaskA($data),
            'taskB' => $this->getTaskB($data),
        ];
    }

    public function parseBags(array $data)
    {
        $bags = [];
        foreach ($data as $rule) {
            $container = [];
            preg_match('/(\w* \w*) bags contain/', $rule, $container);

            $items = [];
            preg_match_all('/(\d+) (\w* \w*) bags?(,|\.)/', $rule, $items);
            if (!$items) {
                continue;
            }

            for ($i = 0; $i < count($items[0]); $i++) {
                $bags[$container[1]][$items[2][$i]] = (int) $items[1][$i];
            }
        }

        $this->setBags($bags);
    }

    public function getTaskA(array $data): int
    {
        if (!$this->getBags()) {
            $this->parseBags($data);
        }

        $containers = [];
        $this->findParentsForBags(['shiny gold'], $containers);

        $flat = $this->flattenBags($containers);

        return count(array_unique($flat));
    }

    public function flattenBags(array $bags): array
    {
        $flat = [];
        foreach ($bags as $bag) {
            foreach ($bag as $item) {
                $flat[] = $item;
            }
        }

        return $flat;
    }

    public function findParentsForBags(array $bags, &$containers)
    {
        foreach ($bags as $bag) {
            $parents = $this->getContainerBags($bag);
            if (!$parents) {
                continue;
            }
            $containers[] = $parents;
            $this->findParentsForBags($parents, $containers);
        }
    }

    public function getContainerBags(string $needle): array
    {
        $containers = [];
        foreach ($this->getBags() as $bagColor => $bagItems) {
            if (!in_array($needle, array_keys($bagItems))) {
                continue;
            }

            $containers[] = $bagColor;
        }

        return $containers;
    }

    public function getTaskB(array $data): int
    {
        if (!$this->getBags()) {
            $this->parseBags($data);
        }

        $sum = 0;
        $sum += $this->getChildBagsCountFor('shiny gold');

        return $sum;
    }

    public function getChildBagsCountFor(string $bag): int
    {
        $allBags = $this->getBags();

        if (!isset($allBags[$bag])) {
            return 0;
        }

        $sum = 0;
        foreach ($allBags[$bag] as $childBagName => $childBagCount) {
            $childChildrenBagCount =  $this->getChildBagsCountFor($childBagName);
            $sum += $childChildrenBagCount > 0
                ? $childBagCount + $childBagCount * $childChildrenBagCount
                : $childBagCount;
        }

        return $sum;
    }
}
