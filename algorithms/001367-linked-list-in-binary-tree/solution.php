<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
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
     * @param ListNode $head
     * @param TreeNode $root
     * @return Boolean
     */
    function isSubPath($head, $root) {
        // Base case: If root is null, no path can exist.
        if ($root === null) {
            return false;
        }

        // Check if the current node is the starting point of the linked list.
        if ($this->dfs($head, $root)) {
            return true;
        }

        // Otherwise, keep searching in the left and right subtrees.
        return $this->isSubPath($head, $root->left) || $this->isSubPath($head, $root->right);
    }

    // Helper function to match the linked list starting from the current tree node.
    function dfs($head, $root) {
        // If the linked list is fully traversed, return true.
        if ($head === null) {
            return true;
        }

        // If the binary tree node is null or the values don't match, return false.
        if ($root === null || $head->val !== $root->val) {
            return false;
        }

        // Continue the search downwards in both left and right subtrees.
        return $this->dfs($head->next, $root->left) || $this->dfs($head->next, $root->right);
    }
}