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

    private int $totalSum = 0;
    private int $maxProduct = 0;
    private int $mod = 1000000007;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxProduct(TreeNode $root): int
    {
        // First pass: compute total sum of all nodes
        $this->totalSum = $this->computeSum($root);

        // Second pass: compute subtree sums and track maximum product
        $this->maxProduct = 0;
        $this->computeSubtreeSum($root);

        return $this->maxProduct % $this->mod;
    }

    /**
     * Compute sum of all nodes in the tree
     */
    private function computeSum($node) {
        if ($node === null) return 0;
        return $node->val + $this->computeSum($node->left) + $this->computeSum($node->right);
    }

    /**
     * Compute subtree sums and track maximum product
     * Returns the sum of the current subtree
     */
    private function computeSubtreeSum($node) {
        if ($node === null) return 0;

        // Compute sum of left and right subtrees
        $leftSum = $this->computeSubtreeSum($node->left);
        $rightSum = $this->computeSubtreeSum($node->right);

        // Sum of current subtree
        $subtreeSum = $node->val + $leftSum + $rightSum;

        // Calculate product if we cut above this node
        // (but don't consider cutting above the root - that would give 0)
        $product = $subtreeSum * ($this->totalSum - $subtreeSum);

        // Update maximum product
        if ($product > $this->maxProduct) {
            $this->maxProduct = $product;
        }

        return $subtreeSum;
    }
}