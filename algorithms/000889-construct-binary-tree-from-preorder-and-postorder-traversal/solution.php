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
     * @param Integer[] $preorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function constructFromPrePost($preorder, $postorder) {
        if (empty($preorder)) {
            return null;
        }
        $rootVal = $preorder[0];
        $root = new TreeNode($rootVal);
        $n = count($preorder);
        if ($n == 1) {
            return $root;
        }
        $leftVal = $preorder[1];
        $leftPostIdx = array_search($leftVal, $postorder);
        $leftSize = $leftPostIdx + 1;

        $leftPre = array_slice($preorder, 1, $leftSize);
        $leftPost = array_slice($postorder, 0, $leftSize);

        $rightPre = array_slice($preorder, $leftSize + 1);
        $rightPost = array_slice($postorder, $leftSize, $n - $leftSize - 1);

        $root->left = $this->constructFromPrePost($leftPre, $leftPost);
        $root->right = $this->constructFromPrePost($rightPre, $rightPost);

        return $root;
    }
}