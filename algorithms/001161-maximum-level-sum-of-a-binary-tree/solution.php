<?php

/**
 * Definition for a binary tree node.
 *
 */
class TreeNode {
    public mixed $val = null;
    public mixed $left = null;
    public mixed $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxLevelSum(TreeNode $root): int
    {
        if ($root === null) {
            return 0;
        }

        $queue = new SplQueue();
        $queue->enqueue($root);

        $maxSum = PHP_INT_MIN;
        $maxLevel = 1;
        $currentLevel = 1;

        while (!$queue->isEmpty()) {
            $levelSize = $queue->count();
            $levelSum = 0;

            // Process all nodes at the current level
            for ($i = 0; $i < $levelSize; $i++) {
                $node = $queue->dequeue();
                $levelSum += $node->val;

                // Add children to queue for next level
                if ($node->left !== null) {
                    $queue->enqueue($node->left);
                }
                if ($node->right !== null) {
                    $queue->enqueue($node->right);
                }
            }

            // Update max sum and level if current level has higher sum
            if ($levelSum > $maxSum) {
                $maxSum = $levelSum;
                $maxLevel = $currentLevel;
            }

            $currentLevel++;
        }

        return $maxLevel;
    }
}

