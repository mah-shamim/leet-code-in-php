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
     * @param Integer $distance
     * @return Integer
     */
    function countPairs($root, $distance) {
        $this->result = 0;
        $this->dfs($root, $distance);
        return $this->result;
    }

    private function dfs($node, $distance) {
        if ($node === null) {
            return [];
        }

        if ($node->left === null && $node->right === null) {
            return [1]; // Return a list with a single element 1 representing a leaf at distance 1.
        }

        $leftDistances = $this->dfs($node->left, $distance);
        $rightDistances = $this->dfs($node->right, $distance);

        foreach ($leftDistances as $left) {
            foreach ($rightDistances as $right) {
                if ($left + $right <= $distance) {
                    $this->result++;
                }
            }
        }

        $allDistances = [];
        foreach ($leftDistances as $d) {
            if ($d + 1 <= $distance) {
                $allDistances[] = $d + 1;
            }
        }
        foreach ($rightDistances as $d) {
            if ($d + 1 <= $distance) {
                $allDistances[] = $d + 1;
            }
        }

        return $allDistances;
    }
}