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
    public function replaceValueInTree($root) {
        $levelSums = [];
        $this->dfs($root, 0, $levelSums);
        return $this->replace($root, 0, new TreeNode(0), $levelSums);
    }

    /**
     * DFS to calculate the sum of node values at each level.
     * @param $root - current node
     * @param $level - current depth level in the tree
     * @param $levelSums - array holding the sum of values at each level
     * @return void
     */
    private function dfs($root, $level, &$levelSums) {
        if ($root === null) {
            return;
        }

        if (count($levelSums) == $level) {
            $levelSums[] = 0; // Initialize the sum for this level
        }

        $levelSums[$level] += $root->val; // Add current node's value to level sum

        // Recursive DFS calls for left and right children
        $this->dfs($root->left, $level + 1, $levelSums);
        $this->dfs($root->right, $level + 1, $levelSums);
    }

    /**
     * DFS to replace the node values with the sum of cousins' values.
     * @param $root - current node in the original tree
     * @param $level - current depth level in the tree
     * @param $curr - node being modified in the new tree
     * @param $levelSums - array holding the sum of values at each level
     * @return mixed
     */
    private function replace($root, $level, $curr, $levelSums) {
        $nextLevel = $level + 1;

        // Calculate the sum of cousins' values
        $nextLevelCousinsSum = ($nextLevel >= count($levelSums)) ? 0 :
            $levelSums[$nextLevel] -
            (($root->left === null) ? 0 : $root->left->val) -
            (($root->right === null) ? 0 : $root->right->val);

        // Update left child if it exists
        if ($root->left !== null) {
            $curr->left = new TreeNode($nextLevelCousinsSum);
            $this->replace($root->left, $level + 1, $curr->left, $levelSums);
        }

        // Update right child if it exists
        if ($root->right !== null) {
            $curr->right = new TreeNode($nextLevelCousinsSum);
            $this->replace($root->right, $level + 1, $curr->right, $levelSums);
        }

        return $curr;
    }
}