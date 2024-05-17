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
     * @param Integer $target
     * @return TreeNode
     */
    function removeLeafNodes($root, $target) {
        if ($root == null) return null;

        if ($root->left == null && $root->right == null && $root->val == $target)
            return null;

        $root->left = $this->removeLeafNodes($root->left, $target);
        $root->right = $this->removeLeafNodes($root->right, $target);

        if ($root->left == null && $root->right == null && $root->val == $target)
            return null;

        return $root;
    }
}