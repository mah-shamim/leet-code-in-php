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
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Boolean
     */
    function flipEquiv($root1, $root2) {
        // If both nodes are null, they are equivalent
        if ($root1 === null && $root2 === null) {
            return true;
        }

        // If one of the nodes is null or the values don't match, they are not equivalent
        if ($root1 === null || $root2 === null || $root1->val !== $root2->val) {
            return false;
        }

        // Check both possibilities:
        // 1. No flip: left with left and right with right
        // 2. Flip: left with right and right with left
        return ($this->flipEquiv($root1->left, $root2->left) && $this->flipEquiv($root1->right, $root2->right)) ||
            ($this->flipEquiv($root1->left, $root2->right) && $this->flipEquiv($root1->right, $root2->left));
    }
}