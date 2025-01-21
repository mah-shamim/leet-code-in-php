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
     * @return Integer[]
     */
    function largestValues($root) {
        if ($root === null) return [];

        $queue = [$root];
        $result = [];

        while (!empty($queue)) {
            $levelSize = count($queue);
            $maxValue = PHP_INT_MIN;

            for ($i = 0; $i < $levelSize; $i++) {
                $currentNode = array_shift($queue);
                $maxValue = max($maxValue, $currentNode->val);

                if ($currentNode->left !== null) {
                    $queue[] = $currentNode->left;
                }
                if ($currentNode->right !== null) {
                    $queue[] = $currentNode->right;
                }
            }

            $result[] = $maxValue;
        }

        return $result;
    }
}