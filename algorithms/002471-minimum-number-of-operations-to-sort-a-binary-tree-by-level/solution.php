<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minimumOperations($root) {
        if (!$root) {
            return 0;
        }

        // Step 1: Perform BFS to get nodes at each level
        $levels = [];
        $queue = [[$root, 0]]; // Node and level

        while (!empty($queue)) {
            list($node, $level) = array_shift($queue);

            if (!isset($levels[$level])) {
                $levels[$level] = [];
            }
            $levels[$level][] = $node->val;

            if ($node->left) {
                $queue[] = [$node->left, $level + 1];
            }
            if ($node->right) {
                $queue[] = [$node->right, $level + 1];
            }
        }

        // Step 2: Calculate the minimum swaps for each level
        $totalSwaps = 0;
        foreach ($levels as $level) {
            $totalSwaps += $this->minSwapsToSort($level);
        }

        return $totalSwaps;
    }

    /**
     * Function to calculate minimum swaps to sort an array
     *
     * @param $arr
     * @return int
     */
    function minSwapsToSort($arr) {
        $n = count($arr);
        $sortedArr = $arr;
        sort($sortedArr);
        $indexMap = array_flip($arr);
        $visited = array_fill(0, $n, false);
        $swaps = 0;

        for ($i = 0; $i < $n; $i++) {
            if ($visited[$i] || $sortedArr[$i] == $arr[$i]) {
                continue;
            }

            $cycleSize = 0;
            $x = $i;

            while (!$visited[$x]) {
                $visited[$x] = true;
                $cycleSize++;
                $x = $indexMap[$sortedArr[$x]];
            }

            if ($cycleSize > 1) {
                $swaps += $cycleSize - 1;
            }
        }

        return $swaps;
    }
}