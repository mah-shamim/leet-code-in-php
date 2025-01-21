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
    function balanceBST($root) {
        $nums = [];
        $this->inorder($root, $nums);
        return $this->build($nums, 0, count($nums) - 1);
    }

    /**
     * @param $root
     * @param $nums
     * @return void
     */
    function inorder($root, &$nums) {
        if ($root == null)
            return;
        $this->inorder($root->left, $nums);
        $nums[] = $root->val;
        $this->inorder($root->right, $nums);
    }

    /**
     * @param $nums
     * @param $l
     * @param $r
     * @return TreeNode|null
     */
    function build($nums, $l, $r) {
        if ($l > $r)
            return null;
        $m = (int)(($l + $r) / 2);
        return new TreeNode($nums[$m], $this->build($nums, $l, $m - 1), $this->build($nums, $m + 1, $r));
    }
}