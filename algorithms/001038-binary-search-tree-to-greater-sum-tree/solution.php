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
    function bstToGst($root) {
        $prefix = 0;

        $reversedInorder = function ($root) use (&$reversedInorder, &$prefix) {
            if ($root == null)
                return;

            $reversedInorder($root->right);

            $root->val += $prefix;
            $prefix = $root->val;

            $reversedInorder($root->left);
        };

        $reversedInorder($root);
        return $root;
    }
}