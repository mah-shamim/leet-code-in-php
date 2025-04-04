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
    function lcaDeepestLeaves($root) {
        $result = $this->dfs($root, 0);
        return $result[1];
    }

    /**
     * @param $node
     * @param $depth
     * @return array
     */
    function dfs($node, $depth) {
        if ($node === null) {
            return [-INF, null];
        }
        if ($node->left === null && $node->right === null) {
            return [$depth, $node];
        }
        $left = $this->dfs($node->left, $depth + 1);
        $right = $this->dfs($node->right, $depth + 1);
        if ($left[0] > $right[0]) {
            return [$left[0], $left[1]];
        } elseif ($right[0] > $left[0]) {
            return [$right[0], $right[1]];
        } else {
            return [$left[0], $node];
        }
    }
}