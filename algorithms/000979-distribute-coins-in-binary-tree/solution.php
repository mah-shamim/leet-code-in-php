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
     * @return Integer
     */
    function distributeCoins(TreeNode $root): int
    {
        $totalMoves = 0; // This will store the total number of moves needed to balance the coins

        // The Depth First Search (DFS) function computes the number of moves required
        // starting from the leaves up to the root of the tree.
        // It returns the excess number of coins that need to be moved from the current node.

        $dfs = function($node) use (&$dfs, &$totalMoves) {

            // Base case: if the current node is null, return 0 since there are no coins to move.
            if (!$node) {
                return 0;
            }

            // Recursive case: solve for left and right subtrees.
            $leftMoves = $dfs($node->left);
            $rightMoves = $dfs($node->right);

            // The number of moves made at the current node is the sum of absolute values of each subtree’s excess coins.
            // Because moves from both left and right need to pass through the current node.
            $totalMoves += abs($leftMoves) + abs($rightMoves);

            // Return the number of excess coins at this node: positive if there are more coins than nodes,
            // negative if there are fewer. A value of -1 means just the right amount for the node itself.
            return $leftMoves + $rightMoves + $node->val - 1;
        };

        // Call the DFS function starting from the root of the tree.
        $dfs($root);

        // Return the total number of moves needed to distribute the coins.
        return $totalMoves;
    }
}