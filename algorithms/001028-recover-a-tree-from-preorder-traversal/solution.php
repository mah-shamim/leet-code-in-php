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
     * @param String $traversal
     * @return TreeNode
     */
    function recoverFromPreorder($traversal) {
        $nodes = $this->parseNodes($traversal);
        if (empty($nodes)) return null;

        $root = new TreeNode($nodes[0][0]);
        $stack = array();
        array_push($stack, array($root, $nodes[0][1]));

        $n = count($nodes);
        for ($i = 1; $i < $n; $i++) {
            $val = $nodes[$i][0];
            $depth = $nodes[$i][1];

            // Pop stack until parent's depth is found
            while (end($stack)[1] != $depth - 1) {
                array_pop($stack);
            }
            $parentPair = end($stack);
            $parentNode = $parentPair[0];

            $newNode = new TreeNode($val);
            if ($parentNode->left === null) {
                $parentNode->left = $newNode;
            } else {
                $parentNode->right = $newNode;
            }
            array_push($stack, array($newNode, $depth));
        }

        return $root;
    }

    /**
     * @param $traversal
     * @return array
     */
    function parseNodes($traversal) {
        $nodes = array();
        $i = 0;
        $n = strlen($traversal);
        while ($i < $n) {
            // Count dashes
            $dashCount = 0;
            while ($i < $n && $traversal[$i] == '-') {
                $dashCount++;
                $i++;
            }
            // Read number
            $num = 0;
            while ($i < $n && is_numeric($traversal[$i])) {
                $num = $num * 10 + intval($traversal[$i]);
                $i++;
            }
            array_push($nodes, array($num, $dashCount));
        }
        return $nodes;
    }
}