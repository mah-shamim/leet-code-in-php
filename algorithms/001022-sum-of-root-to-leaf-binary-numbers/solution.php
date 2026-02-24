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
    function sumRootToLeaf($root): int
    {
        // Start DFS with initial path value 0
        return $this->dfs($root, 0);
    }

    /**
     * Depth‑first search helper.
     *
     * @param TreeNode $node   Current node
     * @param int $path   Binary number formed from root to current node (excluding current)
     * @return int             Sum of all leaf numbers in this subtree
     */
    private function dfs($node, int $path): int
    {
        if ($node === null) {
            return 0;
        }

        // Update path by appending current node's value
        $path = ($path << 1) | $node->val;

        // If it's a leaf, return the complete number
        if ($node->left === null && $node->right === null) {
            return $path;
        }

        // Otherwise, continue traversal on both children and sum results
        return $this->dfs($node->left, $path) + $this->dfs($node->right, $path);
    }
}