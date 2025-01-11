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
     * @param Integer $k
     * @return Integer
     */
    function kthLargestLevelSum($root, $k) {
        if ($root === null) {
            return -1;
        }

        // Use BFS to traverse the tree level by level
        $queue = [];
        array_push($queue, $root);
        $levelSums = [];

        // BFS loop
        while (!empty($queue)) {
            $levelSize = count($queue);
            $currentLevelSum = 0;

            // Process each node in the current level
            for ($i = 0; $i < $levelSize; $i++) {
                $node = array_shift($queue);
                $currentLevelSum += $node->val;

                // Add left and right children to the queue for the next level
                if ($node->left !== null) {
                    array_push($queue, $node->left);
                }
                if ($node->right !== null) {
                    array_push($queue, $node->right);
                }
            }

            // Store the sum of the current level
            array_push($levelSums, $currentLevelSum);
        }

        // Sort the level sums in descending order
        rsort($levelSums);

        // Return the k-th largest level sum
        return isset($levelSums[$k - 1]) ? $levelSums[$k - 1] : -1;
    }
}