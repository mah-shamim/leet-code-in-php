<?php

class Solution {
    private array $treeLeftChar;
    private array $treeRightChar;
    private array $treePrefix;
    private array $treeSuffix;
    private array $treeMax;
    private int $n;

    /**
     * @param String $s
     * @param String $queryCharacters
     * @param Integer[] $queryIndices
     * @return Integer[]
     */
    function longestRepeating(string $s, string $queryCharacters, array $queryIndices): array
    {
        $this->n = strlen($s);
        $size = 4 * $this->n;
        $this->treeLeftChar = array_fill(0, $size, '');
        $this->treeRightChar = array_fill(0, $size, '');
        $this->treePrefix = array_fill(0, $size, 0);
        $this->treeSuffix = array_fill(0, $size, 0);
        $this->treeMax = array_fill(0, $size, 0);

        $this->build(1, 0, $this->n - 1, $s);

        $k = strlen($queryCharacters);
        $result = [];

        for ($i = 0; $i < $k; $i++) {
            $index = $queryIndices[$i];
            $char = $queryCharacters[$i];
            $this->update(1, 0, $this->n - 1, $index, $char);
            $result[] = $this->treeMax[1];
        }

        return $result;
    }

    /**
     * Build segment tree
     *
     * @param $node
     * @param $l
     * @param $r
     * @param $s
     * @return void
     */
    private function build($node, $l, $r, $s): void
    {
        if ($l == $r) {
            $char = $s[$l];
            $this->treeLeftChar[$node] = $char;
            $this->treeRightChar[$node] = $char;
            $this->treePrefix[$node] = 1;
            $this->treeSuffix[$node] = 1;
            $this->treeMax[$node] = 1;
            return;
        }
        $mid = intdiv($l + $r, 2);
        $this->build($node * 2, $l, $mid, $s);
        $this->build($node * 2 + 1, $mid + 1, $r, $s);
        $this->merge($node, $l, $mid, $r);
    }

    /**
     * Merge two child nodes
     *
     * @param $node
     * @param $l
     * @param $mid
     * @param $r
     * @return void
     */
    private function merge($node, $l, $mid, $r): void
    {
        $left = $node * 2;
        $right = $node * 2 + 1;

        $this->treeLeftChar[$node] = $this->treeLeftChar[$left];
        $this->treeRightChar[$node] = $this->treeRightChar[$right];

        // prefix
        $this->treePrefix[$node] = $this->treePrefix[$left];
        if ($this->treePrefix[$left] == ($mid - $l + 1) &&
            $this->treeRightChar[$left] == $this->treeLeftChar[$right]) {
            $this->treePrefix[$node] += $this->treePrefix[$right];
        }

        // suffix
        $this->treeSuffix[$node] = $this->treeSuffix[$right];
        if ($this->treeSuffix[$right] == ($r - $mid) &&
            $this->treeRightChar[$left] == $this->treeLeftChar[$right]) {
            $this->treeSuffix[$node] += $this->treeSuffix[$left];
        }

        // max
        $this->treeMax[$node] = max(
            $this->treeMax[$left],
            $this->treeMax[$right]
        );
        if ($this->treeRightChar[$left] == $this->treeLeftChar[$right]) {
            $this->treeMax[$node] = max(
                $this->treeMax[$node],
                $this->treeSuffix[$left] + $this->treePrefix[$right]
            );
        }
    }

    /**
     * Update a position in the segment tree
     *
     * @param $node
     * @param $l
     * @param $r
     * @param $idx
     * @param $char
     * @return void
     */
    private function update($node, $l, $r, $idx, $char): void
    {
        if ($l == $r) {
            $this->treeLeftChar[$node] = $char;
            $this->treeRightChar[$node] = $char;
            $this->treePrefix[$node] = 1;
            $this->treeSuffix[$node] = 1;
            $this->treeMax[$node] = 1;
            return;
        }
        $mid = intdiv($l + $r, 2);
        if ($idx <= $mid) {
            $this->update($node * 2, $l, $mid, $idx, $char);
        } else {
            $this->update($node * 2 + 1, $mid + 1, $r, $idx, $char);
        }
        $this->merge($node, $l, $mid, $r);
    }
}