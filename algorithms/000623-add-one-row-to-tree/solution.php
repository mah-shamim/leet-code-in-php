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
     * @param Integer $val
     * @param Integer $depth
     * @return TreeNode
     */
    function addOneRow($root, $val, $depth) {
        if ($depth == 1) {
            // Create a new root with value $val, and set the original tree as its left child
            return new TreeNode($val, $root, null);
        }

        // Perform BFS to find nodes at depth - 1
        $queue = [$root];
        $current_depth = 1;

        // Traverse until we reach depth - 1
        while (!empty($queue) && $current_depth < $depth - 1) {
            $size = count($queue);
            for ($i = 0; $i < $size; $i++) {
                $node = array_shift($queue);
                if ($node->left !== null) {
                    $queue[] = $node->left;
                }
                if ($node->right !== null) {
                    $queue[] = $node->right;
                }
            }
            $current_depth++;
        }

        // At this point, we are at depth - 1. Add the new row.
        foreach ($queue as $node) {
            // Save the original left and right children
            $old_left = $node->left;
            $old_right = $node->right;

            // Insert new nodes with value $val
            $node->left = new TreeNode($val, $old_left, null);
            $node->right = new TreeNode($val, null, $old_right);
        }

        return $root;

    }
}