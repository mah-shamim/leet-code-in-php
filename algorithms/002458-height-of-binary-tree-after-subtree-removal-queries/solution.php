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

    private $valToMaxHeight = [];
    private $valToHeight = [];

    /**
     * @param TreeNode $root
     * @param Integer[] $queries
     * @return Integer[]
     */
    function treeQueries($root, $queries) {
        $this->height($root);
        $this->dfs($root, 0, 0);

        $answer = [];
        foreach ($queries as $query) {
            $answer[] = $this->valToMaxHeight[$query];
        }

        return $answer;
    }

    /**
     * Calculate the height of each node and store it in $valToHeight
     *
     * @param $node
     * @return int|mixed
     */
    private function height($node) {
        if ($node === null) {
            return 0;
        }

        if (isset($this->valToHeight[$node->val])) {
            return $this->valToHeight[$node->val];
        }

        $leftHeight = $this->height($node->left);
        $rightHeight = $this->height($node->right);

        $this->valToHeight[$node->val] = 1 + max($leftHeight, $rightHeight);
        return $this->valToHeight[$node->val];
    }

    /**
     * Depth-first traversal to calculate the max height of the tree without each node
     *
     * @param $node
     * @param $depth
     * @param $maxHeight
     * @return void
     */
    private function dfs($node, $depth, $maxHeight) {
        if ($node === null) {
            return;
        }

        $this->valToMaxHeight[$node->val] = $maxHeight;

        // Update heights for left and right subtree
        $leftHeight = isset($this->valToHeight[$node->right->val]) ? $this->valToHeight[$node->right->val] : 0;
        $rightHeight = isset($this->valToHeight[$node->left->val]) ? $this->valToHeight[$node->left->val] : 0;

        // Recursive DFS call for left and right subtrees
        $this->dfs($node->left, $depth + 1, max($maxHeight, $depth + $leftHeight));
        $this->dfs($node->right, $depth + 1, max($maxHeight, $depth + $rightHeight));
    }
}