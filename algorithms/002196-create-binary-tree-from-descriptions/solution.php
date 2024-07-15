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
     * @param Integer[][] $descriptions
     * @return TreeNode
     */
    function createBinaryTree($descriptions) {
        $nodes = [];
        $children = [];

        // Create nodes and build the tree
        foreach ($descriptions as $description) {
            $parentVal = $description[0];
            $childVal = $description[1];
            $isLeft = $description[2];

            if (!isset($nodes[$parentVal])) {
                $nodes[$parentVal] = new TreeNode($parentVal);
            }
            if (!isset($nodes[$childVal])) {
                $nodes[$childVal] = new TreeNode($childVal);
            }

            if ($isLeft) {
                $nodes[$parentVal]->left = $nodes[$childVal];
            } else {
                $nodes[$parentVal]->right = $nodes[$childVal];
            }

            $children[$childVal] = true;
        }

        // Find the root node (node that is not a child of any other node)
        foreach ($nodes as $val => $node) {
            if (!isset($children[$val])) {
                return $node;
            }
        }

        return null;
    }
}