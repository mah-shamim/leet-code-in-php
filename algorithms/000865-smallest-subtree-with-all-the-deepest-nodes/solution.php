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
     * @return TreeNode|null
     */
    function subtreeWithAllDeepest(TreeNode $root): ?TreeNode
    {
        if (!$root) {
            return null;
        }

        // Find deepest leaves using BFS
        $queue = new SplQueue();
        $queue->enqueue($root);
        $deepestLeaves = [];

        while (!$queue->isEmpty()) {
            $levelSize = $queue->count();
            $deepestLeaves = [];

            for ($i = 0; $i < $levelSize; $i++) {
                $node = $queue->dequeue();
                $deepestLeaves[] = $node;

                if ($node->left) {
                    $queue->enqueue($node->left);
                }
                if ($node->right) {
                    $queue->enqueue($node->right);
                }
            }
        }

        // If only one deepest leaf, return it
        if (count($deepestLeaves) == 1) {
            return $deepestLeaves[0];
        }

        // Find LCA of all deepest leaves
        $lca = $deepestLeaves[0];
        for ($i = 1; $i < count($deepestLeaves); $i++) {
            $lca = $this->findLCA($root, $lca, $deepestLeaves[$i]);
        }

        return $lca;
    }

    /**
     * @param $root
     * @param $p
     * @param $q
     * @return mixed
     */
    private function findLCA($root, $p, $q): mixed
    {
        if (!$root || $root == $p || $root == $q) {
            return $root;
        }

        $left = $this->findLCA($root->left, $p, $q);
        $right = $this->findLCA($root->right, $p, $q);

        if ($left && $right) {
            return $root;
        }

        return $left ?: $right;
    }
}