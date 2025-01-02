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
     * @return TreeNode
     */
    function reverseOddLevels($root) {
        if ($root === null) {
            return $root;
        }

        // Call the helper function with root's left and right children
        $this->dfs($root->left, $root->right, true);
        return $root;
    }

    /**
     * Helper function to perform DFS
     *
     * @param $left
     * @param $right
     * @param $isOddLevel
     * @return void
     */
    private function dfs($left, $right, $isOddLevel) {
        // If we reach null nodes, return
        if ($left == null) {
            return;
        }

        // If it's an odd level, swap the values
        if ($isOddLevel) {
            $temp = $left->val;
            $left->val = $right->val;
            $right->val = $temp;
        }

        // Recursively move to the next level
        $this->dfs($left->left, $right->right, !$isOddLevel);
        $this->dfs($left->right, $right->left, !$isOddLevel);
    }
}